<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaDiemTheSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dia_diem_the')->insert([
            // Bà Nà Hills: Check-in (4), Núi rừng (2)
            ['ma_dia_diem' => 1, 'ma_the' => 4],
            ['ma_dia_diem' => 1, 'ma_the' => 2],
            // Sơn Trà: Biển đảo (1), Di sản (3)
            ['ma_dia_diem' => 2, 'ma_the' => 1],
            ['ma_dia_diem' => 2, 'ma_the' => 3],
            // Hồ Xuân Hương: Check-in (4), Nghỉ dưỡng (6)
            ['ma_dia_diem' => 3, 'ma_the' => 4],
            ['ma_dia_diem' => 3, 'ma_the' => 6],
            // Dinh I: Di sản (3), Check-in (4)
            ['ma_dia_diem' => 4, 'ma_the' => 3],
            ['ma_dia_diem' => 4, 'ma_the' => 4],
            // Chợ Bến Thành: Ẩm thực (5), Di sản (3)
            ['ma_dia_diem' => 5, 'ma_the' => 5],
            ['ma_dia_diem' => 5, 'ma_the' => 3],
        ]);
    }
}