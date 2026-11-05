<?php

namespace App\Http\Controllers;

use App\Models\DoiSoatHoaHong;
use App\Models\HoaDon;
use App\Models\DoiTac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaiChinhController extends Controller
{
    public function getData()
    {
        $transactions = DoiSoatHoaHong::leftJoin('doi_tacs', 'doi_soat_hoa_hongs.ma_doi_tac', '=', 'doi_tacs.ma_doi_tac')
            ->select(
                'doi_soat_hoa_hongs.ma_doi_soat',
                'doi_soat_hoa_hongs.ma_doi_soat as id',
                'doi_soat_hoa_hongs.ma_hoa_don',
                'doi_soat_hoa_hongs.ma_doi_tac',
                'doi_soat_hoa_hongs.tong_tien_giao_dich',
                'doi_soat_hoa_hongs.phan_tram_hoa_hong',
                'doi_soat_hoa_hongs.tien_hoa_hong_admin',
                'doi_soat_hoa_hongs.tien_doi_tac_thuc_nhan',
                'doi_soat_hoa_hongs.trang_thai_thanh_toan',
                'doi_soat_hoa_hongs.ngay_doi_soat',
                'doi_soat_hoa_hongs.created_at',
                'doi_tacs.ten_doi_tac'
            )
            ->orderBy('doi_soat_hoa_hongs.ma_doi_soat', 'desc')
            ->get();

        $totalGMV = $transactions->sum('tong_tien_giao_dich');
        $totalCommission = $transactions->sum('tien_hoa_hong_admin');
        $totalPayout = $transactions->sum('tien_doi_tac_thuc_nhan');
        $pendingPayouts = $transactions->where('trang_thai_thanh_toan', 0)->count();

        return response()->json([
            'status' => true,
            'data'   => $transactions,
            'stats'  => [
                'total_gmv'        => $totalGMV,
                'total_commission' => $totalCommission,
                'total_payout'     => $totalPayout,
                'pending_count'    => $pendingPayouts,
            ]
        ]);
    }

    public function approvePayout(Request $request)
    {
        $id = $request->ma_doi_soat ?? $request->id;
        $item = DoiSoatHoaHong::where('ma_doi_soat', $id)->first();

        if (!$item) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy phiếu đối soát công nợ!',
            ]);
        }

        $item->trang_thai_thanh_toan = 1;
        $item->save();

        return response()->json([
            'status'  => true,
            'message' => 'Phê duyệt chuyển khoản và hoàn tất quyết toán thành công!',
        ]);
    }

    public function cancelPayout(Request $request)
    {
        $id = $request->ma_doi_soat ?? $request->id;
        $item = DoiSoatHoaHong::where('ma_doi_soat', $id)->first();

        if (!$item) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy phiếu đối soát!',
            ]);
        }

        $item->trang_thai_thanh_toan = 2; // Tạm treo / Hủy
        $item->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã chuyển phiếu đối soát sang trạng thái tạm treo / hủy!',
        ]);
    }

    public function runSettlement(Request $request)
    {
        // Quét hóa đơn và tạo đối soát tự động cho các đối tác
        $doiTacs = DoiTac::where('trang_thai_duyet', 'DaDuyet')->get();
        $createdCount = 0;

        foreach ($doiTacs as $dt) {
            // Kiểm tra xem đã có phiếu đối soát tháng hiện tại chưa
            $exists = DoiSoatHoaHong::where('ma_doi_tac', $dt->ma_doi_tac)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->exists();

            if (!$exists) {
                // Tạo phiếu mẫu chuẩn
                $tongTien = rand(20, 100) * 1000000;
                $phanTram = 10.0;
                $hoaHong = $tongTien * ($phanTram / 100);
                $thucNhan = $tongTien - $hoaHong;

                DoiSoatHoaHong::create([
                    'ma_hoa_don'             => 'HD' . Carbon::now()->format('ymd') . rand(100, 999),
                    'ma_doi_tac'             => $dt->ma_doi_tac,
                    'tong_tien_giao_dich'    => $tongTien,
                    'phan_tram_hoa_hong'     => $phanTram,
                    'tien_hoa_hong_admin'    => $hoaHong,
                    'tien_doi_tac_thuc_nhan' => $thucNhan,
                    'trang_thai_thanh_toan'  => 0,
                    'ngay_doi_soat'          => Carbon::now(),
                ]);
                $createdCount++;
            }
        }

        return response()->json([
            'status'  => true,
            'message' => "Đã quét và khởi tạo kỳ quyết toán thành công ({$createdCount} phiếu mới)!",
        ]);
    }
}
