<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Http\Requests\CreateKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;
use App\Http\Requests\DeleteKhachHangRequest;
use App\Http\Requests\ChangeStatusKhachHangRequest;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function getData()
    {
        $data = KhachHang::leftJoin('hoa_dons', function ($join) {
                $join->on('khach_hangs.ma_khach_hang', '=', 'hoa_dons.ma_khach_hang_dat')
                     ->whereNull('hoa_dons.deleted_at');
            })
            ->select(
                'khach_hangs.ma_khach_hang',
                'khach_hangs.ma_khach_hang as id',
                'khach_hangs.ho_va_ten',
                'khach_hangs.email',
                'khach_hangs.ngay_sinh',
                'khach_hangs.gioi_tinh',
                'khach_hangs.so_dien_thoai',
                'khach_hangs.is_block',
                'khach_hangs.created_at',
                DB::raw('COALESCE(SUM(hoa_dons.so_tien_thanh_toan), 0) as tong_chi_tieu'),
                DB::raw('COUNT(hoa_dons.ma_hoa_don) as tong_don_hang')
            )
            ->groupBy(
                'khach_hangs.ma_khach_hang',
                'khach_hangs.ho_va_ten',
                'khach_hangs.email',
                'khach_hangs.ngay_sinh',
                'khach_hangs.gioi_tinh',
                'khach_hangs.so_dien_thoai',
                'khach_hangs.is_block',
                'khach_hangs.created_at'
            )
            ->orderBy('khach_hangs.created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data
        ]);
    }

    public function create(CreateKhachHangRequest $request)
    {
        $ma_khach_hang = $request->ma_khach_hang ?? $request->id;
        if (!$ma_khach_hang) {
            $num = KhachHang::withTrashed()->count() + 1;
            do {
                $ma_khach_hang = 'KH' . str_pad($num, 2, '0', STR_PAD_LEFT);
                $num++;
            } while (KhachHang::withTrashed()->where('ma_khach_hang', $ma_khach_hang)->exists());
        }

        KhachHang::create([
            'ma_khach_hang' => $ma_khach_hang,
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'mat_khau'      => bcrypt($request->mat_khau ?? '123456'),
            'ngay_sinh'     => $request->ngay_sinh,
            'gioi_tinh'     => $request->gioi_tinh,
            'so_dien_thoai' => $request->so_dien_thoai,
            'is_block'      => $request->is_block ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Tạo khách hàng thành công',
        ], 201);
    }

    public function capNhat(UpdateKhachHangRequest $request)
    {
        $id = $request->ma_khach_hang ?? $request->id;

        $dataUpdate = [
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'ngay_sinh'     => $request->ngay_sinh,
            'gioi_tinh'     => $request->gioi_tinh,
            'so_dien_thoai' => $request->so_dien_thoai,
            'is_block'      => $request->is_block ?? 0,
        ];

        if ($request->filled('mat_khau')) {
            $dataUpdate['mat_khau'] = bcrypt($request->mat_khau);
        }

        KhachHang::where('ma_khach_hang', $id)->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật khách hàng thành công',
        ]);
    }

    public function destroy(DeleteKhachHangRequest $request)
    {
        $id = $request->ma_khach_hang ?? $request->id;

        KhachHang::where('ma_khach_hang', $id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa khách hàng thành công',
        ]);
    }

    public function doiTrangThai(ChangeStatusKhachHangRequest $request)
    {
        $id = $request->ma_khach_hang ?? $request->id;
        $khachHang = KhachHang::where('ma_khach_hang', $id)->first();

        if ($khachHang) {
            $khachHang->is_block = !$khachHang->is_block;
            $khachHang->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Đổi trạng thái thành công',
            ]);
        }

        return response()->json([
            'status'  => 0,
            'message' => 'Không tìm thấy khách hàng',
        ]);
    }
}
