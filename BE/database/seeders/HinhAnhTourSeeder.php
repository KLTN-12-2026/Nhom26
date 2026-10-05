<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhTourSeeder extends Seeder {
    public function run(): void {
        DB::table("hinh_anh_tours")->insert([
            ["id" => 1, "ma_tour" => "TOUR01", "duong_dan_anh" => "anh_tour_hl1.jpg"],
            ["id" => 2, "ma_tour" => "TOUR01", "duong_dan_anh" => "anh_tour_hl2.jpg"],
            ["id" => 3, "ma_tour" => "TOUR02", "duong_dan_anh" => "anh_tour_ha1.jpg"],
            ["id" => 4, "ma_tour" => "TOUR03", "duong_dan_anh" => "anh_tour_pq1.jpg"],
            ["id" => 5, "ma_tour" => "TOUR04", "duong_dan_anh" => "anh_tour_sp1.jpg"],
        ]);
    }
}