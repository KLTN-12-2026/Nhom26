<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Http\Requests\ThemMoiKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;
use App\Jobs\sendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;

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
            'data'   => $data,
        ]);
    }

    public function store(ThemMoiKhachHangRequest $request)
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
        ]);
    }

    // Alias cho store
    public function create(ThemMoiKhachHangRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateKhachHangRequest $request)
    {
        $id = $request->ma_khach_hang ?? $request->id;
        $khachHang = KhachHang::where('ma_khach_hang', $id)->first();
        if (!$khachHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy dữ liệu!',
            ]);
        }

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

        $khachHang->update($dataUpdate);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật khách hàng thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->ma_khach_hang ?? $request->id;
        $khachHang = KhachHang::where('ma_khach_hang', $id)->first();

        if ($khachHang) {
            $khachHang->delete();

            return response()->json([
                'status'  => 1,
                'message' => 'Xóa khách hàng thành công',
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
        $id = $request->ma_khach_hang ?? $request->id;
        $khachHang = KhachHang::where('ma_khach_hang', $id)->first();

        if ($khachHang) {
            $khachHang->is_block = $khachHang->is_block == 1 ? 0 : 1;
            $khachHang->save();

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

    // ─── ĐĂNG KÝ TÀI KHOẢN KHÁCH HÀNG ────────────────────────────
    public function dangKy(DangKyRequest $request)
    {
        $num = KhachHang::withTrashed()->count() + 1;
        do {
            $ma_khach_hang = 'KH' . str_pad($num, 3, '0', STR_PAD_LEFT);
            $num++;
        } while (KhachHang::withTrashed()->where('ma_khach_hang', $ma_khach_hang)->exists());

        // Sinh mã OTP 6 chữ số
        $otp = str_pad((string)rand(100000, 999999), 6, '0', STR_PAD_LEFT);

        $khachHang = KhachHang::create([
            'ma_khach_hang' => $ma_khach_hang,
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'mat_khau'      => Hash::make($request->mat_khau),
            'is_block'      => 0,
            'is_xac_thuc'   => 0,
            'ma_xac_thuc'   => $otp,
        ]);

        // Gửi email xác thực
        try {
            sendMailJob::dispatch(
                $khachHang->email,
                'Xác thực tài khoản Smart Travel',
                'mail.xac_thuc_tai_khoan',
                [
                    'ho_va_ten'   => $khachHang->ho_va_ten,
                    'ma_xac_thuc' => $khachHang->ma_xac_thuc,
                ]
            );
        } catch (\Throwable $e) {
            Log::error('Lỗi dispatch mail xác thực: ' . $e->getMessage());
        }

        return response()->json([
            'status'      => 1,
            'message'     => 'Đăng ký tài khoản thành công! Vui lòng kiểm tra email để lấy mã xác thực.',
            'email'       => $khachHang->email,
            'ma_xac_thuc' => $otp, // Hỗ trợ test trực tiếp trên môi trường dev
        ]);
    }

    // ─── XÁC THỰC MÃ KÍCH HOẠT / OTP ─────────────────────────────
    public function xacThuc(Request $request)
    {
        $ma = trim($request->ma_xac_thuc ?? $request->otp ?? '');
        $email = trim($request->email ?? '');

        if (!$ma) {
            return response()->json([
                'status'  => 0,
                'message' => 'Vui lòng nhập mã xác thực gồm 6 chữ số.',
            ]);
        }

        $query = KhachHang::where('ma_xac_thuc', $ma);
        if ($email) {
            $query->where('email', $email);
        }
        $user = $query->first();

        if (!$user) {
            if ($email) {
                $checkVerified = KhachHang::where('email', $email)->where('is_xac_thuc', 1)->first();
                if ($checkVerified) {
                    return response()->json([
                        'status'  => 1,
                        'message' => 'Tài khoản này đã được xác thực trước đó. Bạn có thể đăng nhập ngay.',
                    ]);
                }
            }

            return response()->json([
                'status'  => 0,
                'message' => 'Mã xác thực không hợp lệ hoặc đã hết hạn.',
            ]);
        }

        if ($user->is_xac_thuc == 1) {
            return response()->json([
                'status'  => 1,
                'message' => 'Tài khoản này đã được xác thực trước đó. Bạn có thể đăng nhập ngay.',
            ]);
        }

        $user->update([
            'is_xac_thuc' => 1,
            'ma_xac_thuc' => null,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Xác thực tài khoản thành công! Bạn có thể đăng nhập ngay.',
        ]);
    }

    // ─── GỬI LẠI MÃ XÁC THỰC ─────────────────────────────────────
    public function guiLaiMa(Request $request)
    {
        $email = trim($request->email ?? '');
        if (!$email) {
            return response()->json([
                'status'  => 0,
                'message' => 'Vui lòng cung cấp địa chỉ email.',
            ]);
        }

        $user = KhachHang::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy tài khoản với email này.',
            ]);
        }

        if ($user->is_xac_thuc == 1) {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản này đã được xác thực hoàn tất trước đó.',
            ]);
        }

        $newOtp = str_pad((string)rand(100000, 999999), 6, '0', STR_PAD_LEFT);
        $user->update(['ma_xac_thuc' => $newOtp]);

        try {
            sendMailJob::dispatch(
                $user->email,
                'Gửi lại mã xác thực Smart Travel',
                'mail.xac_thuc_tai_khoan',
                [
                    'ho_va_ten'   => $user->ho_va_ten,
                    'ma_xac_thuc' => $newOtp,
                ]
            );
        } catch (\Throwable $e) {
            Log::error('Lỗi gửi lại mail: ' . $e->getMessage());
        }

        return response()->json([
            'status'      => 1,
            'message'     => 'Đã gửi lại mã xác thực thành công. Vui lòng kiểm tra hộp thư!',
            'ma_xac_thuc' => $newOtp,
        ]);
    }

    // ─── ĐĂNG NHẬP KHÁCH HÀNG ────────────────────────────────────
    public function dangNhap(DangNhapRequest $request)
    {
        $user = KhachHang::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->mat_khau, $user->mat_khau)) {
            return response()->json([
                'status'  => 0,
                'message' => 'Email hoặc mật khẩu không chính xác.',
            ]);
        }

        // Kiểm tra đã xác thực tài khoản chưa
        if ($user->is_xac_thuc == 0) {
            return response()->json([
                'status'       => 0,
                'not_verified' => true,
                'email'        => $user->email,
                'message'      => 'Tài khoản chưa được xác thực. Vui lòng nhập mã xác thực từ email.',
            ]);
        }

        // Kiểm tra tài khoản bị khóa
        if ($user->is_block == 1) {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản đã bị tạm khóa. Vui lòng liên hệ ban quản trị.',
            ]);
        }

        // Tạo token Sanctum
        $token = $user->createToken('nguoi_dung_token')->plainTextToken;

        return response()->json([
            'status'     => 1,
            'message'    => 'Đăng nhập thành công!',
            'token'      => $token,
            'nguoi_dung' => [
                'ma_khach_hang' => $user->ma_khach_hang,
                'id'            => $user->ma_khach_hang,
                'ho_va_ten'     => $user->ho_va_ten,
                'email'         => $user->email,
                'so_dien_thoai' => $user->so_dien_thoai,
            ],
        ]);
    }

    // ─── KIỂM TRA ĐĂNG NHẬP QUA TOKEN ────────────────────────────
    public function kiemTraDangNhap(Request $request)
    {
        $bearerToken = $request->bearerToken();

        if (!$bearerToken) {
            return response()->json([
                'status'  => 0,
                'message' => 'Chưa có token xác thực.',
            ]);
        }

        $accessToken = PersonalAccessToken::findToken($bearerToken);

        if (!$accessToken || !$accessToken->tokenable) {
            return response()->json([
                'status'  => 0,
                'message' => 'Token không hợp lệ hoặc đã hết hạn.',
            ]);
        }

        $user = $accessToken->tokenable;

        if ($user->is_block == 1) {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản đã bị khóa.',
            ]);
        }

        return response()->json([
            'status'     => 1,
            'message'    => 'Xác thực token thành công',
            'nguoi_dung' => [
                'ma_khach_hang' => $user->ma_khach_hang ?? $user->id,
                'id'            => $user->ma_khach_hang ?? $user->id,
                'ho_va_ten'     => $user->ho_va_ten,
                'email'         => $user->email,
                'so_dien_thoai' => $user->so_dien_thoai,
            ],
        ]);
    }

    // ─── ĐĂNG XUẤT ───────────────────────────────────────────────
    public function dangXuat(Request $request)
    {
        $bearerToken = $request->bearerToken();
        if ($bearerToken) {
            $accessToken = PersonalAccessToken::findToken($bearerToken);
            if ($accessToken) {
                $accessToken->delete();
            }
        }

        return response()->json([
            'status'  => 1,
            'message' => 'Đăng xuất thành công!',
        ]);
    }
}

