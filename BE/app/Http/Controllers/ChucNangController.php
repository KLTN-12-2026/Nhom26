<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use App\Http\Requests\CreateChucNangRequest;
use App\Http\Requests\UpdateChucNangRequest;
use App\Http\Requests\DeleteChucNangRequest;
use App\Http\Requests\ChangeStatusChucNangRequest;
use Illuminate\Support\Facades\Schema;

class ChucNangController extends Controller
{
    public function getData()
    {
        $data = ChucNang::select('ma_chuc_nang', 'ma_chuc_nang as id', 'ten_chuc_nang', 'duong_dan', 'trang_thai', 'mo_ta', 'created_at')
            ->orderBy('ma_chuc_nang', 'asc')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data
        ]);
    }

    public function create(CreateChucNangRequest $request)
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
        ], 201);
    }

    public function capNhat(UpdateChucNangRequest $request)
    {
        $id = $request->ma_chuc_nang ?? $request->id;

        $dataUpdate = [
            'ten_chuc_nang' => $request->ten_chuc_nang,
            'duong_dan'     => $request->duong_dan ?? $request->path,
            'mo_ta'         => $request->mo_ta,
        ];

        if ($request->has('trang_thai')) {
            $dataUpdate['trang_thai'] = $request->trang_thai;
        }

        ChucNang::where('ma_chuc_nang', $id)->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật chức năng thành công',
        ]);
    }

    public function destroy(DeleteChucNangRequest $request)
    {
        $id = $request->ma_chuc_nang ?? $request->id;

        ChucNang::where('ma_chuc_nang', $id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa chức năng thành công',
        ]);
    }

    public function doiTrangThai(ChangeStatusChucNangRequest $request)
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
            'message' => 'Không tìm thấy chức năng',
        ]);
    }
}
