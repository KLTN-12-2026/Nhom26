<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaTranKhoangCachSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ma_tran_khoang_cach')->insert([
            [
                'ma_khoang_cach'        => 1,
                'dia_diem_xuat_phat_id' => 1,
                'dia_diem_dich_den_id'  => 2,
                'khoang_cach_met'       => 35000,
                'thoi_gian_giay'        => 3600,
                'loai_phuong_tien'      => 'o_to',
                'nguon_du_lieu'         => 'OSRM',
                'ngay_cap_nhat'         => now(),
            ],
            [
                'ma_khoang_cach'        => 2,
                'dia_diem_xuat_phat_id' => 3,
                'dia_diem_dich_den_id'  => 4,
                'khoang_cach_met'       => 4200,
                'thoi_gian_giay'        => 600,
                'loai_phuong_tien'      => 'xe_may',
                'nguon_du_lieu'         => 'OSRM',
                'ngay_cap_nhat'         => now(),
            ],
        ]);
    }
}