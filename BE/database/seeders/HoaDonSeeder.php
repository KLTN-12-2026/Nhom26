<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("hoa_dons")->insert([
            ["ma_hoa_don" => "HD001", "ma_nhom" => "NH001", "ma_khach_hang_dat" => "KH001", "ma_voucher" => "SUMMER2026", "loai_hoa_don" => 1, "tong_tien" => 7500000, "so_tien_giam" => 500000, "so_tien_thanh_toan" => 7000000, "trang_thai_don_hang" => 3, "trang_thai_thanh_toan" => 1, "ngay_tao" => $now->copy()->subDays(2), "updated_at" => $now],
            ["ma_hoa_don" => "HD002", "ma_nhom" => "NH002", "ma_khach_hang_dat" => "KH002", "ma_voucher" => "WELCOME", "loai_hoa_don" => 1, "tong_tien" => 5000000, "so_tien_giam" => 200000, "so_tien_thanh_toan" => 4800000, "trang_thai_don_hang" => 2, "trang_thai_thanh_toan" => 1, "ngay_tao" => $now->copy()->subDays(1), "updated_at" => $now],
            ["ma_hoa_don" => "HD003", "ma_nhom" => null, "ma_khach_hang_dat" => "KH003", "ma_voucher" => null, "loai_hoa_don" => 2, "tong_tien" => 150000, "so_tien_giam" => 0, "so_tien_thanh_toan" => 150000, "trang_thai_don_hang" => 1, "trang_thai_thanh_toan" => 0, "ngay_tao" => $now, "updated_at" => $now],
        ]);
    }
}