<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DoiTacSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("doi_tacs")->insert([
            ["ma_doi_tac" => "DT01", "ten_doi_tac" => "Vietravel", "ten_nguoi_dai_dien" => "Nguyễn Quốc Kỳ", "email" => "info@vietravel.com", "mat_khau" => Hash::make("123456"), "so_dien_thoai" => "0901111111", "dia_chi" => "190 Pasteur, Quận 3, TP.HCM", "is_block" => 0, "trang_thai_duyet" => "DaDuyet", "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_doi_tac" => "DT02", "ten_doi_tac" => "Saigontourist", "ten_nguoi_dai_dien" => "Võ Anh Tài", "email" => "contact@saigontourist.net", "mat_khau" => Hash::make("123456"), "so_dien_thoai" => "0902222222", "dia_chi" => "45 Lê Thánh Tôn, Quận 1, TP.HCM", "is_block" => 0, "trang_thai_duyet" => "DaDuyet", "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_doi_tac" => "DT03", "ten_doi_tac" => "Hanoi Tourist", "ten_nguoi_dai_dien" => "Minh Chung", "email" => "info@hanoitourist.vn", "mat_khau" => Hash::make("123456"), "so_dien_thoai" => "0903333333", "dia_chi" => "18 Lý Thường Kiệt, Hà Nội", "is_block" => 0, "trang_thai_duyet" => "DaDuyet", "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_doi_tac" => "DT04", "ten_doi_tac" => "BenThanh Tourist", "ten_nguoi_dai_dien" => "Đình Quân", "email" => "benthanh@tourist.com", "mat_khau" => Hash::make("123456"), "so_dien_thoai" => "0904444444", "dia_chi" => "82 Calmette, Quận 1, TP.HCM", "is_block" => 0, "trang_thai_duyet" => "ChoDuyet", "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_doi_tac" => "DT05", "ten_doi_tac" => "Fiditour", "ten_nguoi_dai_dien" => "Phương Nhi", "email" => "lienhe@fiditour.com", "mat_khau" => Hash::make("123456"), "so_dien_thoai" => "0905555555", "dia_chi" => "129 Nguyễn Huệ, Quận 1, TP.HCM", "is_block" => 0, "trang_thai_duyet" => "TuChoi", "ly_do_tu_choi" => "Giấy phép kinh doanh không hợp lệ", "created_at" => $now, "updated_at" => $now],
        ]);
    }
}