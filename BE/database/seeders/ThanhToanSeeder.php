<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThanhToanSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("thanh_toans")->insert([
            ["ma_thanh_toan" => "TT001", "ma_hoa_don" => "HD001", "phuong_thuc" => "VNPay", "so_tien" => 7000000, "ma_giao_dich" => "VNP12345678", "trang_thai" => "ThanhCong", "thoi_gian_thanh_toan" => $now->copy()->subDays(2), "created_at" => $now, "updated_at" => $now],
            ["ma_thanh_toan" => "TT002", "ma_hoa_don" => "HD002", "phuong_thuc" => "Momo", "so_tien" => 4800000, "ma_giao_dich" => "MOMO87654321", "trang_thai" => "ThanhCong", "thoi_gian_thanh_toan" => $now->copy()->subDays(1), "created_at" => $now, "updated_at" => $now],
        ]);
    }
}