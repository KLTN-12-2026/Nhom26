<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DanhGiaTourSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("danh_gia_tours")->insert([
            ["id" => 1, "ma_tour" => "TOUR01", "ma_khach_hang" => "KH001", "so_sao" => 5, "binh_luan" => "Tour cực kỳ tuyệt vời, hướng dẫn viên rất thân thiện.", "ngay_danh_gia" => $now->copy()->subDays(1), "trang_thai" => 1],
            ["id" => 2, "ma_tour" => "TOUR01", "ma_khach_hang" => "KH004", "so_sao" => 4, "binh_luan" => "Cảnh đẹp, tuy nhiên đồ ăn hơi ít.", "ngay_danh_gia" => $now->copy()->subDays(1), "trang_thai" => 1],
            ["id" => 3, "ma_tour" => "TOUR02", "ma_khach_hang" => "KH002", "so_sao" => 5, "binh_luan" => "Hội An đẹp ngất ngây, tôi rất thích.", "ngay_danh_gia" => $now, "trang_thai" => 1],
        ]);
    }
}