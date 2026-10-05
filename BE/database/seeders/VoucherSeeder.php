<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("vouchers")->insert([
            ["id" => 1, "ma_voucher" => "SUMMER2026", "ma_doi_tac" => "DT01", "ten_voucher" => "Chào Hè Sôi Động", "loai_giam_gia" => "PhanTram", "gia_tri_giam" => 10, "giam_toi_da" => 500000, "don_toi_thieu" => 2000000, "ngay_bat_dau" => $now->copy()->subDays(5)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(30)->format('Y-m-d'), "so_luong" => 100, "da_su_dung" => 20, "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
            ["id" => 2, "ma_voucher" => "WELCOME", "ma_doi_tac" => "DT02", "ten_voucher" => "Voucher Bạn Mới", "loai_giam_gia" => "TienMat", "gia_tri_giam" => 200000, "giam_toi_da" => 200000, "don_toi_thieu" => 1000000, "ngay_bat_dau" => $now->copy()->subDays(10)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(60)->format('Y-m-d'), "so_luong" => 500, "da_su_dung" => 50, "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}