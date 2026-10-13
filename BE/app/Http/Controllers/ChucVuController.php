<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Http\Requests\ThemMoiChucVuRequest;
use App\Http\Requests\UpdateChucVuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChucVuController extends Controller
{
    public function getData()
    {
        $data = ChucVu::leftJoin('admins', function ($join) {
                $join->on('chuc_vus.ma_chuc_vu', '=', 'admins.ma_chuc_vu')
                     ->whereNull('admins.deleted_at');
            })
            ->select(
                'chuc_vus.ma_chuc_vu',
                'chuc_vus.ma_chuc_vu as id',
                'chuc_vus.ten_chuc_vu',
                'chuc_vus.mo_ta',
                'chuc_vus.trang_thai',
                'chuc_vus.created_at',
                DB::raw('COUNT(admins.ma_admin) as so_nhan_su')
            )
            ->groupBy('chuc_vus.ma_chuc_vu', 'chuc_vus.ten_chuc_vu', 'chuc_vus.mo_ta', 'chuc_vus.trang_thai', 'chuc_vus.created_at')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function store(ThemMoiChucVuRequest $request)
    {
        $ma_chuc_vu = $request->ma_chuc_vu ?? $request->id;
        if (!$ma_chuc_vu) {
            $num = ChucVu::withTrashed()->count() + 1;
            do {
                $ma_chuc_vu = 'CV' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (ChucVu::withTrashed()->where('ma_chuc_vu', $ma_chuc_vu)->exists());
        }

        $dataCreate = [
            'ma_chuc_vu'  => $ma_chuc_vu,
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'mo_ta'       => $request->mo_ta,
            'trang_thai'  => $request->has('trang_thai') ? $request->trang_thai : 1,
        ];

        ChucVu::create($dataCreate);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo chức vụ thành công',
        ]);
    }

    // Alias cho store
    public function create(ThemMoiChucVuRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateChucVuRequest $request)
    {
        $id = $request->ma_chuc_vu ?? $request->id;
        $chucVu = ChucVu::where('ma_chuc_vu', $id)->first();
        if (!$chucVu) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        $dataUpdate = [
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'mo_ta'       => $request->mo_ta,
        ];

        if ($request->has('trang_thai')) {
            $dataUpdate['trang_thai'] = $request->trang_thai;
        }

        $chucVu->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật chức vụ thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_chuc_vu ?? $request->id;
        $chucVu = ChucVu::where('ma_chuc_vu', $id)->first();

        if ($chucVu) {
            $chucVu->delete();

            return response()->json([
                'status'  => 1,
                'message' => 'Xóa chức vụ thành công',
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
        $id = $request->ma_chuc_vu ?? $request->id;
        $chucVu = ChucVu::where('ma_chuc_vu', $id)->first();

        if ($chucVu) {
            $chucVu->trang_thai = $chucVu->trang_thai == 1 ? 0 : 1;
            $chucVu->save();

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
}
