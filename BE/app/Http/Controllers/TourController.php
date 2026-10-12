<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\DoiTac;
use App\Models\TourKhoiHanh;
use App\Http\Requests\CreateTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Http\Requests\DeleteTourRequest;
use App\Http\Requests\ChangeStatusTourRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /**
     * Lấy toàn bộ danh sách Tour du lịch
     * - Liên kết với bảng doi_tacs để lấy thông tin đơn vị lữ hành
     * - Liên kết với bảng tour_khoi_hanhs để lấy giá khởi hành (gia_tour) và số lượng lịch khởi hành
     */
    public function getData()
    {
        // 1. Truy vấn danh sách tour kèm thông tin đối tác và giá khởi hành từ bảng tour_khoi_hanhs
        $data = Tour::leftJoin('doi_tacs', 'tours.ma_doi_tac', '=', 'doi_tacs.ma_doi_tac')
            ->leftJoin('tour_khoi_hanhs', function ($join) {
                $join->on('tours.ma_tour', '=', 'tour_khoi_hanhs.ma_tour')
                     ->whereNull('tour_khoi_hanhs.deleted_at');
            })
            ->select(
                'tours.ma_tour',
                'tours.ma_tour as id',
                'tours.ma_doi_tac',
                'tours.ten_tour',
                'tours.mo_ta',
                'tours.hinh_anh_dai_dien',
                'tours.so_ngay',
                'tours.so_nguoi_toi_da',
                'tours.trang_thai_duyet',
                'tours.trang_thai_hien_thi',
                'tours.ly_do_tu_choi',
                'tours.created_at',
                'doi_tacs.ten_doi_tac',
                'doi_tacs.email as email_doi_tac',
                'doi_tacs.so_dien_thoai as so_dien_thoai_doi_tac',
                'doi_tacs.dia_chi as dia_chi_doi_tac',
                'doi_tacs.ma_so_thue as ma_so_thue_doi_tac',
                // Giá khởi hành lấy từ bảng tour_khoi_hanhs (lấy mức giá tối thiểu của các lịch khởi hành)
                DB::raw('COALESCE(MIN(tour_khoi_hanhs.gia_tour), 0) as gia_khoi_diem'),
                DB::raw('COALESCE(MIN(tour_khoi_hanhs.gia_tour), 0) as gia_khoi_hanh'),
                DB::raw('COALESCE(MIN(tour_khoi_hanhs.gia_tour), 0) as gia_tour'),
                DB::raw('COUNT(tour_khoi_hanhs.ma_thoi_gian_tour) as so_lich_khoi_hanh')
            )
            ->groupBy(
                'tours.ma_tour',
                'tours.ma_doi_tac',
                'tours.ten_tour',
                'tours.mo_ta',
                'tours.hinh_anh_dai_dien',
                'tours.so_ngay',
                'tours.so_nguoi_toi_da',
                'tours.trang_thai_duyet',
                'tours.trang_thai_hien_thi',
                'tours.ly_do_tu_choi',
                'tours.created_at',
                'doi_tacs.ten_doi_tac',
                'doi_tacs.email',
                'doi_tacs.so_dien_thoai',
                'doi_tacs.dia_chi',
                'doi_tacs.ma_so_thue'
            )
            ->orderBy('tours.created_at', 'desc')
            ->get();

        // 2. Lấy danh sách đối tác đang hoạt động phục vụ dropdown lọc và chọn đối tác
        $doiTacList = DoiTac::select('ma_doi_tac', 'ten_doi_tac')
            ->orderBy('ten_doi_tac', 'asc')
            ->get();

        // 3. Trả về kết quả JSON
        return response()->json([
            'status'   => 1,
            'data'     => $data,
            'doi_tac'  => $doiTacList
        ]);
    }

    /**
     * Thêm mới tour du lịch
     * - Tự động tạo mã tour nếu người dùng để trống
     * - Lưu thông tin tour vào bảng tours
     * - Đồng thời tạo lịch khởi hành mẫu kèm giá khởi hành (gia_tour) trong bảng tour_khoi_hanhs
     */
    public function create(CreateTourRequest $request)
    {
        // 1. Xử lý mã tour: nếu để trống thì tự sinh mã dạng TR01, TR02...
        $ma_tour = $request->ma_tour ?? $request->id;
        if (!$ma_tour) {
            $num = Tour::withTrashed()->count() + 1;
            do {
                $ma_tour = 'TR' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (Tour::withTrashed()->where('ma_tour', $ma_tour)->exists());
        }

        // 2. Thêm mới bản ghi vào bảng tours
        Tour::create([
            'ma_tour'             => $ma_tour,
            'ma_doi_tac'          => $request->ma_doi_tac,
            'ten_tour'            => $request->ten_tour,
            'mo_ta'               => $request->mo_ta,
            'hinh_anh_dai_dien'   => $request->hinh_anh_dai_dien,
            'so_ngay'             => $request->so_ngay ?? 1,
            'so_nguoi_toi_da'     => $request->so_nguoi_toi_da ?? 20,
            'trang_thai_duyet'    => $request->trang_thai_duyet ?? 'DaDuyet',
            'trang_thai_hien_thi' => $request->trang_thai_hien_thi ?? 1,
            'ly_do_tu_choi'       => $request->ly_do_tu_choi,
        ]);

        // 3. Xử lý giá khởi hành: lưu vào bảng tour_khoi_hanhs
        $giaTour = $request->gia_tour ?? $request->gia_khoi_hanh;
        if ($giaTour !== null && $giaTour !== '') {
            $numTKT = TourKhoiHanh::withTrashed()->count() + 1;
            do {
                $maTKT = 'TKT' . str_pad($numTKT, 3, '0', STR_PAD_LEFT);
                $numTKT++;
            } while (TourKhoiHanh::withTrashed()->where('ma_thoi_gian_tour', $maTKT)->exists());

            TourKhoiHanh::create([
                'ma_thoi_gian_tour' => $maTKT,
                'ma_tour'           => $ma_tour,
                'ngay_bat_dau'      => now()->addDays(7)->toDateString(),
                'ngay_ket_thuc'     => now()->addDays(7 + ($request->so_ngay ?? 1))->toDateString(),
                'gia_tour'          => $giaTour,
                'so_cho'            => $request->so_nguoi_toi_da ?? 20,
                'tinh_trang'        => 1,
            ]);
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Thêm mới tour thành công',
        ], 201);
    }

    /**
     * Cập nhật thông tin tour du lịch
     * - Cập nhật dữ liệu bảng tours
     * - Cập nhật hoặc tạo mới giá khởi hành (gia_tour) trong bảng tour_khoi_hanhs
     */
    public function capNhat(UpdateTourRequest $request)
    {
        $id = $request->ma_tour ?? $request->id;

        // 1. Chuẩn bị mảng dữ liệu cập nhật cho bảng tours
        $dataUpdate = [
            'ma_doi_tac'          => $request->ma_doi_tac,
            'ten_tour'            => $request->ten_tour,
            'mo_ta'               => $request->mo_ta,
            'hinh_anh_dai_dien'   => $request->hinh_anh_dai_dien,
            'so_ngay'             => $request->so_ngay ?? 1,
            'so_nguoi_toi_da'     => $request->so_nguoi_toi_da ?? 20,
            'trang_thai_hien_thi' => $request->trang_thai_hien_thi ?? 1,
        ];

        if ($request->has('trang_thai_duyet')) {
            $dataUpdate['trang_thai_duyet'] = $request->trang_thai_duyet;
        }

        if ($request->has('ly_do_tu_choi')) {
            $dataUpdate['ly_do_tu_choi'] = $request->ly_do_tu_choi;
        }

        Tour::where('ma_tour', $id)->update($dataUpdate);

        // 2. Cập nhật giá khởi hành trong bảng tour_khoi_hanhs
        $giaTour = $request->gia_tour ?? $request->gia_khoi_hanh;
        if ($giaTour !== null && $giaTour !== '') {
            $khoiHanh = TourKhoiHanh::where('ma_tour', $id)->first();
            if ($khoiHanh) {
                // Đã có lịch khởi hành thì cập nhật lại giá tour
                $khoiHanh->gia_tour = $giaTour;
                if ($request->filled('so_nguoi_toi_da')) {
                    $khoiHanh->so_cho = $request->so_nguoi_toi_da;
                }
                $khoiHanh->save();
            } else {
                // Nếu chưa có lịch khởi hành thì tạo mới 1 lịch khởi hành cho tour
                $numTKT = TourKhoiHanh::withTrashed()->count() + 1;
                do {
                    $maTKT = 'TKT' . str_pad($numTKT, 3, '0', STR_PAD_LEFT);
                    $numTKT++;
                } while (TourKhoiHanh::withTrashed()->where('ma_thoi_gian_tour', $maTKT)->exists());

                TourKhoiHanh::create([
                    'ma_thoi_gian_tour' => $maTKT,
                    'ma_tour'           => $id,
                    'ngay_bat_dau'      => now()->addDays(7)->toDateString(),
                    'ngay_ket_thuc'     => now()->addDays(7 + ($request->so_ngay ?? 1))->toDateString(),
                    'gia_tour'          => $giaTour,
                    'so_cho'            => $request->so_nguoi_toi_da ?? 20,
                    'tinh_trang'        => 1,
                ]);
            }
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật tour thành công',
        ]);
    }

    /**
     * Xóa mềm tour du lịch
     */
    public function destroy(DeleteTourRequest $request)
    {
        $id = $request->ma_tour ?? $request->id;

        // Xóa tour trong bảng tours
        Tour::where('ma_tour', $id)->delete();

        // Xóa các lịch khởi hành liên quan trong bảng tour_khoi_hanhs
        TourKhoiHanh::where('ma_tour', $id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa tour thành công',
        ]);
    }

    /**
     * Bật/tắt trạng thái hiển thị mở bán của tour
     */
    public function doiTrangThai(ChangeStatusTourRequest $request)
    {
        $id = $request->ma_tour ?? $request->id;
        $tour = Tour::where('ma_tour', $id)->first();

        if ($tour) {
            $tour->trang_thai_hien_thi = !$tour->trang_thai_hien_thi;
            $tour->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Đổi trạng thái hiển thị thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy tour',
        ]);
    }

    /**
     * Xét duyệt tour du lịch (DaDuyet, ChoDuyet, TuChoi)
     */
    public function duyetTour(Request $request)
    {
        $id = $request->ma_tour ?? $request->id;
        $tour = Tour::where('ma_tour', $id)->first();

        if ($tour) {
            $tour->trang_thai_duyet = $request->trang_thai_duyet ?? 'DaDuyet';
            if ($request->has('ly_do_tu_choi')) {
                $tour->ly_do_tu_choi = $request->ly_do_tu_choi;
            }
            $tour->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Cập nhật trạng thái duyệt tour thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy tour',
        ]);
    }
}
