<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DichVuSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("dich_vus")->insert([
            ["ma_dich_vu" => "DV001", "ma_doi_tac" => "DT01", "ma_dia_diem" => "DD001", "ten_dich_vu" => "Thuê chèo Kayak Hạ Long", "loai_dich_vu" => "Giải trí", "mo_ta" => "Cho thuê thuyền Kayak tự chèo.", "don_gia" => 150000, "don_vi_tinh" => "Giờ", "trang_thai_duyet" => "DaDuyet", "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
            ["ma_dich_vu" => "DV002", "ma_doi_tac" => "DT02", "ma_dia_diem" => "DD003", "ten_dich_vu" => "Bữa tối hải sản Phú Quốc", "loai_dich_vu" => "Ăn uống", "mo_ta" => "Set hải sản tươi sống cho 2 người.", "don_gia" => 800000, "don_vi_tinh" => "Suất", "trang_thai_duyet" => "DaDuyet", "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
            ["ma_dich_vu" => "DV003", "ma_doi_tac" => "DT02", "ma_dia_diem" => "DD004", "ten_dich_vu" => "Vé cáp treo Ba Na Hills", "loai_dich_vu" => "Vé", "mo_ta" => "Vé cáp treo khứ hồi.", "don_gia" => 900000, "don_vi_tinh" => "Vé", "trang_thai_duyet" => "DaDuyet", "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
            ["ma_dich_vu" => "DV004", "ma_doi_tac" => "DT03", "ma_dia_diem" => "DD005", "ten_dich_vu" => "Vé tham quan Fansipan", "loai_dich_vu" => "Vé", "mo_ta" => "Bao gồm vé cáp treo và tàu điện ngầm.", "don_gia" => 1100000, "don_vi_tinh" => "Vé", "trang_thai_duyet" => "DaDuyet", "trang_thai" => 1, "created_at" => $now, "updated_at" => $now],
            ["ma_dich_vu" => "DV005", "ma_doi_tac" => "DT04", "ma_dia_diem" => "DD002", "ten_dich_vu" => "Cho thuê xe máy Hội An", "loai_dich_vu" => "Di chuyển", "mo_ta" => "Xe máy vi vu phố cổ.", "don_gia" => 150000, "don_vi_tinh" => "Ngày", "trang_thai_duyet" => "ChoDuyet", "trang_thai" => 0, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}