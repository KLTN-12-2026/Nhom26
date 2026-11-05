<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoaDonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hoa_don')->insert([
            [
                'ma_hoa_don'      => 1,
                'ma_dat_tour'     => 1,
                'tong_tien'       => 2300000.00,
                'trang_thai'      => 'da_thanh_toan',
                'ngay_lap'        => now()->subDays(2),
                'ngay_thanh_toan' => now()->subDays(2),
            ],
            [
                'ma_hoa_don'      => 2,
                'ma_dat_tour'     => 2,
                'tong_tien'       => 2850000.00,
                'trang_thai'      => 'chua_thanh_toan',
                'ngay_lap'        => now(),
                'ngay_thanh_toan' => null,
            ],
        ]);
    }
}