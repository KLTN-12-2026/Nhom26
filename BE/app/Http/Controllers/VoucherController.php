<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Http\Requests\ThemMoiVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function getData()
    {
        $vouchers = Voucher::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'data'   => $vouchers,
        ]);
    }

    public function store(ThemMoiVoucherRequest $request)
    {
        $ma_voucher = $request->ma_voucher ? strtoupper(trim($request->ma_voucher)) : null;
        if (!$ma_voucher) {
            do {
                $ma_voucher = 'VC' . strtoupper(Str::random(6));
            } while (Voucher::withTrashed()->where('ma_voucher', $ma_voucher)->exists());
        }

        Voucher::create([
            'ma_voucher'    => $ma_voucher,
            'ma_doi_tac'    => $request->ma_doi_tac ?? 'ADMIN',
            'ten_voucher'   => $request->ten_voucher,
            'loai_giam_gia' => $request->loai_giam_gia,
            'gia_tri_giam'  => $request->gia_tri_giam,
            'giam_toi_da'   => $request->giam_toi_da,
            'don_toi_thieu' => $request->don_toi_thieu,
            'so_luong'      => $request->so_luong ?? 0,
            'da_su_dung'    => 0,
            'ngay_bat_dau'  => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'trang_thai'    => $request->has('trang_thai') ? $request->trang_thai : 1,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Phát hành voucher thành công!',
        ]);
    }

    public function create(ThemMoiVoucherRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateVoucherRequest $request)
    {
        $voucher = null;
        if ($request->has('id')) {
            $voucher = Voucher::find($request->id);
        }
        if (!$voucher && $request->has('ma_voucher')) {
            $voucher = Voucher::where('ma_voucher', $request->ma_voucher)->first();
        }

        if (!$voucher) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy voucher để cập nhật!',
            ]);
        }

        $voucher->update([
            'ten_voucher'   => $request->ten_voucher,
            'loai_giam_gia' => $request->loai_giam_gia,
            'gia_tri_giam'  => $request->gia_tri_giam,
            'giam_toi_da'   => $request->giam_toi_da,
            'don_toi_thieu' => $request->don_toi_thieu,
            'so_luong'      => $request->so_luong ?? $voucher->so_luong,
            'ngay_bat_dau'  => $request->ngay_bat_dau ?? $voucher->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc ?? $voucher->ngay_ket_thuc,
            'trang_thai'    => $request->has('trang_thai') ? $request->trang_thai : $voucher->trang_thai,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật voucher thành công!',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $voucher = null;
        if ($request->has('id')) {
            $voucher = Voucher::find($request->id);
        } elseif ($request->has('ma_voucher')) {
            $voucher = Voucher::where('ma_voucher', $request->ma_voucher)->first();
        }

        if ($voucher) {
            $voucher->trang_thai = $voucher->trang_thai == 1 ? 0 : 1;
            $voucher->save();

            return response()->json([
                'status'  => true,
                'message' => 'Đổi trạng thái voucher thành công!',
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Không tìm thấy voucher!',
        ]);
    }

    public function destroy(Request $request)
    {
        $voucher = null;
        if ($request->has('id')) {
            $voucher = Voucher::find($request->id);
        } elseif ($request->has('ma_voucher')) {
            $voucher = Voucher::where('ma_voucher', $request->ma_voucher)->first();
        }

        if ($voucher) {
            $voucher->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Xóa voucher thành công!',
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Không tìm thấy voucher để xóa!',
        ]);
    }

    public function delete(Request $request)
    {
        return $this->destroy($request);
    }
}
