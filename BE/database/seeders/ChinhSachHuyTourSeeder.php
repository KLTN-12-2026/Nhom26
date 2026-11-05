<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChinhSachHuyTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chinh_sach_huy_tour')->insert([
            // Tour 1
            ['ma_chinh_sach' => 1, 'ma_tour' => 1, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 72, 'ti_le_hoan_tien' => 100.00, 'ngay_tao' => now()],
            ['ma_chinh_sach' => 2, 'ma_tour' => 1, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 48, 'ti_le_hoan_tien' => 70.00,  'ngay_tao' => now()],
            ['ma_chinh_sach' => 3, 'ma_tour' => 1, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 24, 'ti_le_hoan_tien' => 50.00,  'ngay_tao' => now()],
            // Tour 2
            ['ma_chinh_sach' => 4, 'ma_tour' => 2, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 120, 'ti_le_hoan_tien' => 100.00, 'ngay_tao' => now()],
            ['ma_chinh_sach' => 5, 'ma_tour' => 2, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 72,  'ti_le_hoan_tien' => 80.00,  'ngay_tao' => now()],
            ['ma_chinh_sach' => 6, 'ma_tour' => 2, 'phien_ban' => 1, 'so_gio_truoc_khoi_hanh' => 24,  'ti_le_hoan_tien' => 40.00,  'ngay_tao' => now()],
        ]);
    }
}