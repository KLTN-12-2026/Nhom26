<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourKhoiHanhSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("tour_khoi_hanhs")->insert([
            ["ma_thoi_gian_tour" => "TKT001", "ma_tour" => "TOUR01", "ngay_bat_dau" => $now->copy()->addDays(10)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(11)->format('Y-m-d'), "gia_tour" => 2500000, "so_cho" => 20, "tinh_trang" => 1],
            ["ma_thoi_gian_tour" => "TKT002", "ma_tour" => "TOUR01", "ngay_bat_dau" => $now->copy()->addDays(20)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(21)->format('Y-m-d'), "gia_tour" => 2500000, "so_cho" => 20, "tinh_trang" => 1],
            ["ma_thoi_gian_tour" => "TKT003", "ma_tour" => "TOUR02", "ngay_bat_dau" => $now->copy()->addDays(15)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(17)->format('Y-m-d'), "gia_tour" => 3500000, "so_cho" => 15, "tinh_trang" => 1],
            ["ma_thoi_gian_tour" => "TKT004", "ma_tour" => "TOUR03", "ngay_bat_dau" => $now->copy()->addDays(25)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(27)->format('Y-m-d'), "gia_tour" => 5500000, "so_cho" => 30, "tinh_trang" => 1],
            ["ma_thoi_gian_tour" => "TKT005", "ma_tour" => "TOUR04", "ngay_bat_dau" => $now->copy()->addDays(30)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(33)->format('Y-m-d'), "gia_tour" => 4000000, "so_cho" => 25, "tinh_trang" => 1],
        ]);
    }
}