<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\HinhAnhDiaDiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiaDiemController extends Controller
{
    /**
     * Lấy danh sách địa điểm du lịch (POI) phục vụ kiểm duyệt & quản trị
     */
    public function getData(Request $request)
    {
        $query = DiaDiem::leftJoin('doi_tacs', 'dia_diems.ma_doi_tac_tao', '=', 'doi_tacs.ma_doi_tac')
            ->select(
                'dia_diems.ma_dia_diem',
                'dia_diems.ma_doi_tac_tao',
                'dia_diems.ten_dia_diem',
                'dia_diems.loai',
                'dia_diems.dia_chi',
                'dia_diems.so_dien_thoai',
                'dia_diems.kinh_do',
                'dia_diems.vi_do',
                'dia_diems.gio_mo_cua',
                'dia_diems.gio_dong_cua',
                'dia_diems.gia_giao_dong',
                'dia_diems.hinh_anh_dai_dien',
                'dia_diems.mo_ta',
                'dia_diems.trang_thai_duyet',
                'dia_diems.trang_thai_hien_thi',
                'dia_diems.ly_do_tu_choi',
                'dia_diems.created_at',
                'doi_tacs.ten_doi_tac',
                'doi_tacs.so_dien_thoai as sdt_doi_tac',
                'doi_tacs.email as email_doi_tac'
            );

        if ($request->has('trang_thai_duyet') && !empty($request->trang_thai_duyet)) {
            $query->where('dia_diems.trang_thai_duyet', $request->trang_thai_duyet);
        }

        $list = $query->orderBy('dia_diems.created_at', 'desc')->get();

        // Kèm danh sách ảnh phụ từ hinh_anh_dia_diems
        $maDiaDiems = $list->pluck('ma_dia_diem')->toArray();
        $gallery = HinhAnhDiaDiem::whereIn('ma_dia_diem', $maDiaDiems)->get()->groupBy('ma_dia_diem');

        $list->each(function ($item) use ($gallery) {
            $item->gallery = $gallery->get($item->ma_dia_diem, []);
        });

        // Thống kê nhanh KPI
        $stats = [
            'tong_so'   => DiaDiem::count(),
            'da_duyet'  => DiaDiem::where('trang_thai_duyet', 'DaDuyet')->count(),
            'cho_duyet' => DiaDiem::where('trang_thai_duyet', 'ChoDuyet')->count(),
            'tu_choi'   => DiaDiem::where('trang_thai_duyet', 'TuChoi')->count(),
        ];

        return response()->json([
            'status' => true,
            'data'   => $list,
            'stats'  => $stats,
        ]);
    }

    /**
     * Phê duyệt hoặc Từ chối địa điểm
     */
    public function duyetDiaDiem(Request $request)
    {
        $id = $request->ma_dia_diem ?? $request->id;
        $diaDiem = DiaDiem::where('ma_dia_diem', $id)->first();

        if (!$diaDiem) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy thông tin địa điểm cần kiểm duyệt!',
            ]);
        }

        $trang_thai = $request->trang_thai_duyet; // 'DaDuyet' hoặc 'TuChoi'
        if (!in_array($trang_thai, ['DaDuyet', 'TuChoi', 'ChoDuyet'])) {
            return response()->json([
                'status'  => false,
                'message' => 'Trạng thái kiểm duyệt không hợp lệ!',
            ]);
        }

        $diaDiem->trang_thai_duyet = $trang_thai;
        if ($trang_thai === 'TuChoi') {
            $diaDiem->ly_do_tu_choi = $request->ly_do_tu_choi ?? 'Thông tin hồ sơ địa điểm chưa đầy đủ hoặc không đạt chuẩn.';
        } else if ($trang_thai === 'DaDuyet') {
            $diaDiem->ly_do_tu_choi = null;
        }
        $diaDiem->save();

        $actionText = $trang_thai === 'DaDuyet' ? 'Phê duyệt' : ($trang_thai === 'TuChoi' ? 'Từ chối' : 'Cập nhật');

        return response()->json([
            'status'  => true,
            'message' => "{$actionText} địa điểm {$diaDiem->ten_dia_diem} thành công!",
            'data'    => $diaDiem,
        ]);
    }

    /**
     * Bật / Tắt trạng thái hiển thị địa điểm (1 <-> 0)
     */
    public function changeStatus(Request $request)
    {
        $id = $request->ma_dia_diem ?? $request->id;
        $diaDiem = DiaDiem::where('ma_dia_diem', $id)->first();

        if (!$diaDiem) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy địa điểm!',
            ]);
        }

        $diaDiem->trang_thai_hien_thi = $diaDiem->trang_thai_hien_thi == 1 ? 0 : 1;
        $diaDiem->save();

        $statusText = $diaDiem->trang_thai_hien_thi == 1 ? 'hiển thị' : 'tạm ẩn';

        return response()->json([
            'status'  => true,
            'message' => "Đã chuyển địa điểm {$diaDiem->ten_dia_diem} sang trạng thái {$statusText}!",
            'data'    => $diaDiem,
        ]);
    }

    /**
     * Xóa địa điểm (Soft Delete)
     */
    public function destroy(Request $request)
    {
        $id = $request->ma_dia_diem ?? $request->id;
        $diaDiem = DiaDiem::where('ma_dia_diem', $id)->first();

        if (!$diaDiem) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy địa điểm để xóa!',
            ]);
        }

        $diaDiem->delete();

        return response()->json([
            'status'  => true,
            'message' => "Đã xóa địa điểm {$diaDiem->ten_dia_diem} thành công!",
        ]);
    }

    public function delete(Request $request)
    {
        return $this->destroy($request);
    }
}
