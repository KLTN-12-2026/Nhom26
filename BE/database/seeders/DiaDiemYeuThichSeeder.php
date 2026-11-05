<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaDiemYeuThichSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dia_diem_yeu_thich')->insert([
            ['ma_nguoi_dung' => 4, 'ma_dia_diem' => 1, 'ngay_luu' => now()],
            ['ma_nguoi_dung' => 4, 'ma_dia_diem' => 2, 'ngay_luu' => now()],
            ['ma_nguoi_dung' => 5, 'ma_dia_diem' => 3, 'ngay_luu' => now()],
            ['ma_nguoi_dung' => 5, 'ma_dia_diem' => 4, 'ngay_luu' => now()],
        ]);
    }
}