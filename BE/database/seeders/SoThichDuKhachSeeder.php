<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoThichDuKhachSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('so_thich_du_khach')->insert([
            ['ma_nguoi_dung' => 4, 'ma_the' => 1, 'muc_do_uu_tien' => 5],
            ['ma_nguoi_dung' => 4, 'ma_the' => 4, 'muc_do_uu_tien' => 4],
            ['ma_nguoi_dung' => 4, 'ma_the' => 5, 'muc_do_uu_tien' => 4],
            ['ma_nguoi_dung' => 5, 'ma_the' => 2, 'muc_do_uu_tien' => 5],
            ['ma_nguoi_dung' => 5, 'ma_the' => 3, 'muc_do_uu_tien' => 4],
            ['ma_nguoi_dung' => 5, 'ma_the' => 6, 'muc_do_uu_tien' => 5],
        ]);
    }
}