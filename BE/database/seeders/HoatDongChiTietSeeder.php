<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HoatDongChiTietSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("hoat_dong_chi_tiets")->insert([
            ["ma_hoat_dong_chi_tiet" => "HDCT001", "ma_ke_hoach" => "KHP001", "ma_dia_diem" => "DD001", "ma_thoi_gian_tour" => null, "ghi_chu" => "Nhận phòng khách sạn", "gio_bat_dau" => "14:00:00", "gio_ket_thuc" => "15:00:00", "ngay_cu_the" => $now->copy()->addDays(5)->format('Y-m-d'), "chi_phi_du_kien" => 0],
            ["ma_hoat_dong_chi_tiet" => "HDCT002", "ma_ke_hoach" => "KHP001", "ma_dia_diem" => "DD001", "ma_thoi_gian_tour" => "TKT001", "ghi_chu" => "Tham gia tour Hạ Long", "gio_bat_dau" => "08:00:00", "gio_ket_thuc" => "17:00:00", "ngay_cu_the" => $now->copy()->addDays(6)->format('Y-m-d'), "chi_phi_du_kien" => 2500000],
        ]);
    }
}