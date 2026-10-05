<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("tours")->insert([
            ["ma_tour" => "TOUR01", "ma_doi_tac" => "DT01", "ten_tour" => "Khám phá Vịnh Hạ Long 2N1Đ", "mo_ta" => "Nghỉ ngơi trên du thuyền 5 sao, thăm quan vịnh và đảo Tuần Châu.", "hinh_anh_dai_dien" => "tour_halong.jpg", "so_ngay" => 2, "so_nguoi_toi_da" => 20, "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_tour" => "TOUR02", "ma_doi_tac" => "DT01", "ten_tour" => "Hành trình Di sản Hội An", "mo_ta" => "Thăm khu phố cổ, đi thuyền thả hoa đăng.", "hinh_anh_dai_dien" => "tour_hoian.jpg", "so_ngay" => 3, "so_nguoi_toi_da" => 15, "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_tour" => "TOUR03", "ma_doi_tac" => "DT02", "ten_tour" => "Phú Quốc Đảo Ngọc Resort 5 sao", "mo_ta" => "Nghỉ dưỡng sang trọng, lặn biển ngắm san hô.", "hinh_anh_dai_dien" => "tour_phuquoc.jpg", "so_ngay" => 3, "so_nguoi_toi_da" => 30, "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_tour" => "TOUR04", "ma_doi_tac" => "DT03", "ten_tour" => "Sapa - Đỉnh Fansipan mùa lúa chín", "mo_ta" => "Trekking Sapa, leo đỉnh Fansipan.", "hinh_anh_dai_dien" => "tour_sapa.jpg", "so_ngay" => 4, "so_nguoi_toi_da" => 25, "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_tour" => "TOUR05", "ma_doi_tac" => "DT04", "ten_tour" => "Đà Nẵng - Bà Nà Hills - Cầu Vàng", "mo_ta" => "Tham quan Đà Nẵng, vui chơi tại Sun World.", "hinh_anh_dai_dien" => "tour_danang.jpg", "so_ngay" => 3, "so_nguoi_toi_da" => 40, "trang_thai_duyet" => "ChoDuyet", "trang_thai_hien_thi" => 0, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}