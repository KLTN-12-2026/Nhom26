<?php

namespace App\Http\Controllers;

use App\Models\DoiTac;
use App\Http\Requests\ThemMoiDoiTacRequest;
use App\Http\Requests\UpdateDoiTacRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoiTacController extends Controller
{
    public function getData()
    {
        $data = DoiTac::leftJoin('tours', function ($join) {
                $join->on('doi_tacs.ma_doi_tac', '=', 'tours.ma_doi_tac')
                     ->whereNull('tours.deleted_at');
            })
            ->select(
                'doi_tacs.ma_doi_tac',
                'doi_tacs.ma_doi_tac as id',
                'doi_tacs.ten_doi_tac',
                'doi_tacs.ma_so_thue',
                'doi_tacs.ten_nguoi_dai_dien',
                'doi_tacs.email',
                'doi_tacs.so_dien_thoai',
                'doi_tacs.dia_chi',
                'doi_tacs.is_block',
                'doi_tacs.trang_thai_duyet',
                'doi_tacs.ly_do_tu_choi',
                'doi_tacs.created_at',
                DB::raw('COUNT(tours.ma_tour) as so_luong_tour')
            )
            ->groupBy(
                'doi_tacs.ma_doi_tac',
                'doi_tacs.ten_doi_tac',
                'doi_tacs.ma_so_thue',
                'doi_tacs.ten_nguoi_dai_dien',
                'doi_tacs.email',
                'doi_tacs.so_dien_thoai',
                'doi_tacs.dia_chi',
                'doi_tacs.is_block',
                'doi_tacs.trang_thai_duyet',
                'doi_tacs.ly_do_tu_choi',
                'doi_tacs.created_at'
            )
            ->orderBy('doi_tacs.created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function store(ThemMoiDoiTacRequest $request)
    {
        $ma_doi_tac = $request->ma_doi_tac ?? $request->id;
        if (!$ma_doi_tac) {
            $num = DoiTac::withTrashed()->count() + 1;
            do {
                $ma_doi_tac = 'DT' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (DoiTac::withTrashed()->where('ma_doi_tac', $ma_doi_tac)->exists());
        }

        DoiTac::create([
            'ma_doi_tac'         => $ma_doi_tac,
            'ten_doi_tac'        => $request->ten_doi_tac,
            'ma_so_thue'         => $request->ma_so_thue,
            'ten_nguoi_dai_dien' => $request->ten_nguoi_dai_dien,
            'email'              => $request->email,
            'mat_khau'           => bcrypt($request->mat_khau ?? '123456'),
            'so_dien_thoai'      => $request->so_dien_thoai,
            'dia_chi'            => $request->dia_chi,
            'is_block'           => $request->is_block ?? 0,
            'trang_thai_duyet'   => $request->trang_thai_duyet ?? 'DaDuyet',
            'ly_do_tu_choi'      => $request->ly_do_tu_choi,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo đối tác thành công',
        ]);
    }

    // Alias cho store
    public function create(ThemMoiDoiTacRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateDoiTacRequest $request)
    {
        $id = $request->ma_doi_tac ?? $request->id;
        $doiTac = DoiTac::where('ma_doi_tac', $id)->first();
        if (!$doiTac) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        $dataUpdate = [
            'ten_doi_tac'        => $request->ten_doi_tac,
            'ma_so_thue'         => $request->ma_so_thue,
            'ten_nguoi_dai_dien' => $request->ten_nguoi_dai_dien,
            'email'              => $request->email,
            'so_dien_thoai'      => $request->so_dien_thoai,
            'dia_chi'            => $request->dia_chi,
            'is_block'           => $request->is_block ?? 0,
        ];

        if ($request->has('trang_thai_duyet')) {
            $dataUpdate['trang_thai_duyet'] = $request->trang_thai_duyet;
        }

        if ($request->has('ly_do_tu_choi')) {
            $dataUpdate['ly_do_tu_choi'] = $request->ly_do_tu_choi;
        }

        if ($request->filled('mat_khau')) {
            $dataUpdate['mat_khau'] = bcrypt($request->mat_khau);
        }

        $doiTac->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật đối tác thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_doi_tac ?? $request->id;
        $doiTac = DoiTac::where('ma_doi_tac', $id)->first();

        if ($doiTac) {
            $doiTac->delete();

            return response()->json([
                'status'  => 1,
                'message' => 'Xóa đối tác thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy dữ liệu!',
        ]);
    }

    // Alias cho destroy
    public function delete(Request $request)
    {
        return $this->destroy($request);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->ma_doi_tac ?? $request->id;
        $doiTac = DoiTac::where('ma_doi_tac', $id)->first();

        if ($doiTac) {
            $doiTac->is_block = $doiTac->is_block == 1 ? 0 : 1;
            $doiTac->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Đổi trạng thái thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy dữ liệu!',
        ]);
    }

    // Alias cho changeStatus
    public function doiTrangThai(Request $request)
    {
        return $this->changeStatus($request);
    }

    public function duyetDoiTac(Request $request)
    {
        $id = $request->ma_doi_tac ?? $request->id;
        $doiTac = DoiTac::where('ma_doi_tac', $id)->first();

        if ($doiTac) {
            $doiTac->trang_thai_duyet = $request->trang_thai_duyet ?? 'DaDuyet';
            if ($request->has('ly_do_tu_choi')) {
                $doiTac->ly_do_tu_choi = $request->ly_do_tu_choi;
            }
            $doiTac->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Cập nhật trạng thái duyệt thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy dữ liệu!',
        ]);
    }
}
