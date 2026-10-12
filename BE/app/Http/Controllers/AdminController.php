<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ChucVu;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\DeleteAdminRequest;
use App\Http\Requests\ChangeStatusAdminRequest;

class AdminController extends Controller
{
    public function getData()
    {
        $data = Admin::leftJoin('chuc_vus', 'admins.ma_chuc_vu', '=', 'chuc_vus.ma_chuc_vu')
            ->select(
                'admins.ma_admin',
                'admins.ho_va_ten',
                'admins.email',
                'admins.ma_chuc_vu',
                'admins.is_block',
                'admins.created_at',
                'chuc_vus.ten_chuc_vu'
            )
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data
        ]);
    }

    public function create(CreateAdminRequest $request)
    {
        $ma_admin = $request->ma_admin;
        if (!$ma_admin) {
            $num = Admin::withTrashed()->count() + 1;
            do {
                $ma_admin = 'AD' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (Admin::withTrashed()->where('ma_admin', $ma_admin)->exists());
        }

        Admin::create([
            'ma_admin'   => $ma_admin,
            'ho_va_ten'  => $request->ho_va_ten,
            'email'      => $request->email,
            'mat_khau'   => bcrypt($request->mat_khau ?? '123456'),
            'ma_chuc_vu' => $request->ma_chuc_vu,
            'is_block'   => $request->is_block ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo tài khoản Admin thành công',
        ], 201);
    }

    public function capNhat(UpdateAdminRequest $request)
    {
        $dataUpdate = [
            'ho_va_ten'  => $request->ho_va_ten,
            'email'      => $request->email,
            'ma_chuc_vu' => $request->ma_chuc_vu,
            'is_block'   => $request->is_block ?? 0,
        ];

        if ($request->filled('mat_khau')) {
            $dataUpdate['mat_khau'] = bcrypt($request->mat_khau);
        }

        Admin::where('ma_admin', $request->ma_admin)->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật tài khoản Admin thành công',
        ]);
    }

    public function destroy(DeleteAdminRequest $request)
    {
        Admin::where('ma_admin', $request->ma_admin)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa tài khoản Admin thành công',
        ]);
    }

    public function doiTrangThai(ChangeStatusAdminRequest $request)
    {
        $admin = Admin::where('ma_admin', $request->ma_admin)->first();
        if ($admin) {
            $admin->is_block = !$admin->is_block;
            $admin->save();
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Đổi trạng thái thành công',
        ]);
    }
}
