<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ChucVu;
use App\Http\Requests\ThemMoiAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;

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
                'admins.is_master',
                'admins.created_at',
                'chuc_vus.ten_chuc_vu'
            )
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function store(ThemMoiAdminRequest $request)
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
            'is_master'  => $request->is_master ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo tài khoản Admin thành công',
        ]);
    }

    // Alias cho store
    public function create(ThemMoiAdminRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateAdminRequest $request)
    {
        $id = $request->ma_admin ?? $request->id;
        $admin = Admin::where('ma_admin', $id)->first();
        if (!$admin) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        // Bảo vệ tài khoản Quản trị tối cao
        if (($admin->is_master ?? 0) == 1 || $admin->ma_admin === 'AD01') {
            return response()->json([
                'status'  => 0,
                'message' => 'Không thể cập nhật thông tin của tài khoản Quản trị viên tối cao (is_master)!',
            ]);
        }

        $dataUpdate = [
            'ho_va_ten'  => $request->ho_va_ten,
            'email'      => $request->email,
            'ma_chuc_vu' => $request->ma_chuc_vu,
            'is_block'   => $request->is_block ?? 0,
        ];

        if ($request->filled('mat_khau')) {
            $dataUpdate['mat_khau'] = bcrypt($request->mat_khau);
        }

        $admin->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật tài khoản Admin thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_admin ?? $request->id;
        $admin = Admin::where('ma_admin', $id)->first();

        if (!$admin) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        // Bảo vệ tài khoản Quản trị tối cao
        if (($admin->is_master ?? 0) == 1 || $admin->ma_admin === 'AD01') {
            return response()->json([
                'status'  => 0,
                'message' => 'Không thể xóa tài khoản Quản trị viên tối cao (is_master)!',
            ]);
        }

        $admin->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa tài khoản Admin thành công',
        ]);
    }

    // Alias cho destroy
    public function delete(Request $request)
    {
        return $this->destroy($request);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->ma_admin ?? $request->id;
        $admin = Admin::where('ma_admin', $id)->first();

        if (!$admin) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

        // Bảo vệ tài khoản Quản trị tối cao
        if (($admin->is_master ?? 0) == 1 || $admin->ma_admin === 'AD01') {
            return response()->json([
                'status'  => 0,
                'message' => 'Không thể khóa tài khoản Quản trị viên tối cao (is_master)!',
            ]);
        }

        $admin->is_block = $admin->is_block == 1 ? 0 : 1;
        $admin->save();

        return response()->json([
            'status'  => 1,
            'message' => 'Đổi trạng thái thành công',
        ]);
    }

    // Alias cho changeStatus
    public function doiTrangThai(Request $request)
    {
        return $this->changeStatus($request);
    }
}
