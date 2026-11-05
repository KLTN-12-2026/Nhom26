<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucDiaDiemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('danh_muc_dia_diem')->insert([
            ['ma_danh_muc' => 1, 'ten_danh_muc' => 'Danh lam thắng cảnh', 'bieu_tuong' => 'fa-mountain-sun', 'ngay_tao' => now()],
            ['ma_danh_muc' => 2, 'ten_danh_muc' => 'Di tích lịch sử & Văn hóa', 'bieu_tuong' => 'fa-landmark', 'ngay_tao' => now()],
            ['ma_danh_muc' => 3, 'ten_danh_muc' => 'Điểm vui chơi & Check-in', 'bieu_tuong' => 'fa-camera-retro', 'ngay_tao' => now()],
            ['ma_danh_muc' => 4, 'ten_danh_muc' => 'Ẩm thực & Đặc sản địa phương', 'bieu_tuong' => 'fa-utensils', 'ngay_tao' => now()],
            ['ma_danh_muc' => 5, 'ten_danh_muc' => 'Khu du lịch sinh thái & Thiên nhiên', 'bieu_tuong' => 'fa-tree', 'ngay_tao' => now()],
        ]);
    }
}