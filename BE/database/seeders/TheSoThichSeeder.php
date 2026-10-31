<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheSoThichSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('the_so_thich')->insert([
            ['ma_the' => 1, 'ten_the' => 'Biển đảo', 'nhom_the' => 'thien_nhien', 'mo_ta' => 'Các bãi biển, vịnh đảo xanh'],
            ['ma_the' => 2, 'ten_the' => 'Núi rừng & Thác', 'nhom_the' => 'thien_nhien', 'mo_ta' => 'Khí hậu mát mẻ, đồi núi, suối thác'],
            ['ma_the' => 3, 'ten_the' => 'Di sản & Lịch sử', 'nhom_the' => 'van_hoa', 'mo_ta' => 'Chùa chiền, lăng tẩm, phố cổ, di tích'],
            ['ma_the' => 4, 'ten_the' => 'Check-in sống ảo', 'nhom_the' => 'hoat_dong', 'mo_ta' => 'Điểm chụp ảnh đẹp, view triệu đô'],
            ['ma_the' => 5, 'ten_the' => 'Ẩm thực đặc sản', 'nhom_the' => 'van_hoa', 'mo_ta' => 'Thưởng thức món ngon đường phố, ẩm thực vùng miền'],
            ['ma_the' => 6, 'ten_the' => 'Nghỉ dưỡng & Cafe', 'nhom_the' => 'hoat_dong', 'mo_ta' => 'Thư giãn, cafe chill ngắm cảnh'],
        ]);
    }
}