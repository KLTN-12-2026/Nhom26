<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CauHinhHeThongSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cau_hinh_he_thong')->insert([
            ['khoa_cau_hinh' => 'TOC_DO_XE_MAY', 'gia_tri' => '35', 'mo_ta' => 'Vận tốc trung bình của xe máy (km/h) cho thuật toán tính lộ trình', 'ngay_cap_nhat' => now()],
            ['khoa_cau_hinh' => 'TOC_DO_O_TO', 'gia_tri' => '50', 'mo_ta' => 'Vận tốc trung bình ô tô (km/h)', 'ngay_cap_nhat' => now()],
            ['khoa_cau_hinh' => 'GIO_AN_TRUA', 'gia_tri' => '12:00', 'mo_ta' => 'Khung giờ gợi ý dừng ăn trưa', 'ngay_cap_nhat' => now()],
            ['khoa_cau_hinh' => 'TRONG_SO_SO_THICH', 'gia_tri' => '0.40', 'mo_ta' => 'Hệ số ưu tiên sở thích người dùng trong thuật toán AI đề xuất', 'ngay_cap_nhat' => now()],
            ['khoa_cau_hinh' => 'THOI_HAN_GIU_CHO_PHUT', 'gia_tri' => '60', 'mo_ta' => 'Thời gian tối đa giữ chỗ cho đơn tour chưa thanh toán', 'ngay_cap_nhat' => now()],
        ]);
    }
}