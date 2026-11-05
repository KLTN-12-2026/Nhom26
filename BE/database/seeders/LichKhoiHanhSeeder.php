<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichKhoiHanhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lich_khoi_hanh')->insert([
            [
                'ma_lich_khoi_hanh'     => 1,
                'ma_tour'               => 1,
                'ngay_khoi_hanh'        => '2026-11-05',
                'ngay_ket_thuc_du_kien' => '2026-11-05',
                'gio_khoi_hanh'         => '07:30:00',
                'tong_so_cho'           => 30,
                'so_cho_con_lai'        => 28,
                'trang_thai'            => 'mo_ban',
            ],
            [
                'ma_lich_khoi_hanh'     => 2,
                'ma_tour'               => 1,
                'ngay_khoi_hanh'        => '2026-11-12',
                'ngay_ket_thuc_du_kien' => '2026-11-12',
                'gio_khoi_hanh'         => '07:30:00',
                'tong_so_cho'           => 30,
                'so_cho_con_lai'        => 30,
                'trang_thai'            => 'mo_ban',
            ],
            [
                'ma_lich_khoi_hanh'     => 3,
                'ma_tour'               => 2,
                'ngay_khoi_hanh'        => '2026-11-20',
                'ngay_ket_thuc_du_kien' => '2026-11-22',
                'gio_khoi_hanh'         => '08:00:00',
                'tong_so_cho'           => 20,
                'so_cho_con_lai'        => 19,
                'trang_thai'            => 'mo_ban',
            ],
        ]);
    }
}