<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietTourSeeder extends Seeder {
    public function run(): void {
        DB::table("chi_tiet_tours")->insert([
            ["ma_chi_tiet_tour" => "CTT001", "ma_tour" => "TOUR01", "ma_dia_diem" => "DD001", "ngay_hanh_trinh" => 1, "thu_tu_hanh_trinh" => 1, "ghi_chu_hanh_trinh" => "Đón khách và tham quan Hang Sửng Sốt"],
            ["ma_chi_tiet_tour" => "CTT002", "ma_tour" => "TOUR01", "ma_dia_diem" => "DD001", "ngay_hanh_trinh" => 2, "thu_tu_hanh_trinh" => 1, "ghi_chu_hanh_trinh" => "Chèo thuyền Kayak và về lại bờ"],
            ["ma_chi_tiet_tour" => "CTT003", "ma_tour" => "TOUR02", "ma_dia_diem" => "DD002", "ngay_hanh_trinh" => 1, "thu_tu_hanh_trinh" => 1, "ghi_chu_hanh_trinh" => "Khám phá phố cổ Hội An"],
            ["ma_chi_tiet_tour" => "CTT004", "ma_tour" => "TOUR03", "ma_dia_diem" => "DD003", "ngay_hanh_trinh" => 1, "thu_tu_hanh_trinh" => 1, "ghi_chu_hanh_trinh" => "Nghỉ dưỡng tại Resort Phú Quốc"],
            ["ma_chi_tiet_tour" => "CTT005", "ma_tour" => "TOUR04", "ma_dia_diem" => "DD005", "ngay_hanh_trinh" => 2, "thu_tu_hanh_trinh" => 1, "ghi_chu_hanh_trinh" => "Leo cáp treo Fansipan"],
        ]);
    }
}