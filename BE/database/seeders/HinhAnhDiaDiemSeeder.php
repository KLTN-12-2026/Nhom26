<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhDiaDiemSeeder extends Seeder {
    public function run(): void {
        DB::table("hinh_anh_dia_diems")->insert([
            ["id" => 1, "ma_dia_diem" => "DD001", "duong_dan_anh" => "anh_halong_01.jpg"],
            ["id" => 2, "ma_dia_diem" => "DD001", "duong_dan_anh" => "anh_halong_02.jpg"],
            ["id" => 3, "ma_dia_diem" => "DD002", "duong_dan_anh" => "anh_hoian_01.jpg"],
            ["id" => 4, "ma_dia_diem" => "DD002", "duong_dan_anh" => "anh_hoian_02.jpg"],
            ["id" => 5, "ma_dia_diem" => "DD003", "duong_dan_anh" => "anh_phuquoc_01.jpg"],
            ["id" => 6, "ma_dia_diem" => "DD004", "duong_dan_anh" => "anh_banahills_01.jpg"],
            ["id" => 7, "ma_dia_diem" => "DD005", "duong_dan_anh" => "anh_fansipan_01.jpg"],
        ]);
    }
}