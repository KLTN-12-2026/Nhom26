<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TuyenDiemTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tuyen_diem_tour')->insert([
            ['id' => 1, 'ma_tour' => 1, 'ma_dia_diem' => 1, 'thu_tu' => 1],
            ['id' => 2, 'ma_tour' => 1, 'ma_dia_diem' => 2, 'thu_tu' => 2],
            ['id' => 3, 'ma_tour' => 2, 'ma_dia_diem' => 3, 'thu_tu' => 1],
            ['id' => 4, 'ma_tour' => 2, 'ma_dia_diem' => 4, 'thu_tu' => 2],
        ]);
    }
}