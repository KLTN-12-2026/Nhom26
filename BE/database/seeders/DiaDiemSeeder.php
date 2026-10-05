<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiaDiemSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("dia_diems")->insert([
            ["ma_dia_diem" => "DD001", "ma_doi_tac_tao" => "DT01", "ten_dia_diem" => "Vịnh Hạ Long", "loai" => "Khám phá", "dia_chi" => "Quảng Ninh", "so_dien_thoai" => "0203111111", "kinh_do" => 107.0435, "vi_do" => 20.8931, "gio_mo_cua" => "07:00:00", "gio_dong_cua" => "22:00:00", "gia_giao_dong" => 200000, "hinh_anh_dai_dien" => "halong.jpg", "mo_ta" => "Di sản thiên nhiên thế giới tuyệt đẹp.", "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_dia_diem" => "DD002", "ma_doi_tac_tao" => "DT01", "ten_dia_diem" => "Phố Cổ Hội An", "loai" => "Văn hóa", "dia_chi" => "Quảng Nam", "so_dien_thoai" => "0203222222", "kinh_do" => 108.3276, "vi_do" => 15.8797, "gio_mo_cua" => "08:00:00", "gio_dong_cua" => "23:00:00", "gia_giao_dong" => 0, "hinh_anh_dai_dien" => "hoian.jpg", "mo_ta" => "Khu phố cổ kính bên dòng sông Thu Bồn.", "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_dia_diem" => "DD003", "ma_doi_tac_tao" => "DT02", "ten_dia_diem" => "Đảo Ngọc Phú Quốc", "loai" => "Biển", "dia_chi" => "Kiên Giang", "so_dien_thoai" => "0203333333", "kinh_do" => 103.9572, "vi_do" => 10.2289, "gio_mo_cua" => "06:00:00", "gio_dong_cua" => "20:00:00", "gia_giao_dong" => 500000, "hinh_anh_dai_dien" => "phuquoc.jpg", "mo_ta" => "Hòn đảo lớn nhất Việt Nam.", "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_dia_diem" => "DD004", "ma_doi_tac_tao" => "DT02", "ten_dia_diem" => "Sun World Ba Na Hills", "loai" => "Nghỉ dưỡng", "dia_chi" => "Đà Nẵng", "so_dien_thoai" => "0203444444", "kinh_do" => 107.9946, "vi_do" => 15.9984, "gio_mo_cua" => "07:30:00", "gio_dong_cua" => "21:30:00", "gia_giao_dong" => 900000, "hinh_anh_dai_dien" => "banahills.jpg", "mo_ta" => "Cáp treo và cầu Vàng nổi tiếng.", "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_dia_diem" => "DD005", "ma_doi_tac_tao" => "DT03", "ten_dia_diem" => "Đỉnh Fansipan", "loai" => "Núi", "dia_chi" => "Lào Cai", "so_dien_thoai" => "0203555555", "kinh_do" => 103.8415, "vi_do" => 22.3364, "gio_mo_cua" => "08:00:00", "gio_dong_cua" => "17:00:00", "gia_giao_dong" => 800000, "hinh_anh_dai_dien" => "fansipan.jpg", "mo_ta" => "Nóc nhà Đông Dương.", "trang_thai_duyet" => "DaDuyet", "trang_thai_hien_thi" => 1, "ly_do_tu_choi" => null, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}