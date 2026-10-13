<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use App\Http\Requests\ThemMoiChucNangRequest;
use App\Http\Requests\UpdateChucNangRequest;
use Illuminate\Http\Request;

class ChucNangController extends Controller
{
    public function getData()
    {
        $data = ChucNang::select('ma_chuc_nang', 'ma_chuc_nang as id', 'ten_chuc_nang', 'duong_dan', 'trang_thai', 'mo_ta', 'created_at')
            ->orderBy('ma_chuc_nang', 'asc')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function store(ThemMoiChucNangRequest $request)
    {
        $ma_chuc_nang = $request->ma_chuc_nang ?? $request->id;
        if (!$ma_chuc_nang) {
            $num = ChucNang::withTrashed()->count() + 1;
            do {
                $ma_chuc_nang = 'CN' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (ChucNang::withTrashed()->where('ma_chuc_nang', $ma_chuc_nang)->exists());
        }

        $dataCreate = [
            'ma_chuc_nang'  => $ma_chuc_nang,
            'ten_chuc_nang' => $request->ten_chuc_nang,
            'duong_dan'     => $request->duong_dan ?? $request->path,
            'mo_ta'         => $request->mo_ta,
            'trang_thai'    => $request->has('trang_thai') ? $request->trang_thai : 1,
        ];

        ChucNang::create($dataCreate);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo chức năng thành công',
        ]);
    }

    // Alias cho store
    public function create(ThemMoiChucNangRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateChucNangRequest $request)
    {
        $id = $request->ma_chuc_nang ?? $request->id;
        $chucNang = ChucNang::where('ma_chuc_nang', $id)->first();
        if (!$chucNang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        $dataUpdate = [
            'ten_chuc_nang' => $request->ten_chuc_nang,
            'duong_dan'     => $request->duong_dan ?? $request->path,
            'mo_ta'         => $request->mo_ta,
        ];

        if ($request->has('trang_thai')) {
            $dataUpdate['trang_thai'] = $request->trang_thai;
        }

        $chucNang->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật chức năng thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_chuc_nang ?? $request->id;
        $chucNang = ChucNang::where('ma_chuc_nang', $id)->first();

        if ($chucNang) {
            $chucNang->delete();

            return response()->json([
                'status'  => 1,
                'message' => 'Xóa chức năng thành công',
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
        $id = $request->ma_chuc_nang ?? $request->id;
        $chucNang = ChucNang::where('ma_chuc_nang', $id)->first();

        if ($chucNang) {
            $chucNang->trang_thai = $chucNang->trang_thai == 1 ? 0 : 1;
            $chucNang->save();

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
