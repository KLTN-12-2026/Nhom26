<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietHoaDonSeeder extends Seeder {
    public function run(): void {
        DB::table("chi_tiet_hoa_dons")->insert([
            ["ma_chi_tiet" => "CTHD001", "ma_hoa_don" => "HD001", "ma_thoi_gian_tour" => "TKT001", "ma_dich_vu" => null, "so_luong" => 3, "don_gia" => 2500000, "thanh_tien" => 7500000],
            ["ma_chi_tiet" => "CTHD002", "ma_hoa_don" => "HD002", "ma_thoi_gian_tour" => "TKT002", "ma_dich_vu" => null, "so_luong" => 2, "don_gia" => 2500000, "thanh_tien" => 5000000],
            ["ma_chi_tiet" => "CTHD003", "ma_hoa_don" => "HD003", "ma_thoi_gian_tour" => null, "ma_dich_vu" => "DV001", "so_luong" => 1, "don_gia" => 150000, "thanh_tien" => 150000],
        ]);
    }
}