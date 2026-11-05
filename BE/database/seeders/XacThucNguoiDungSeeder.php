<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class XacThucNguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('xac_thuc_nguoi_dung')->insert([
            [
                'ma_xac_thuc'   => 1,
                'ma_nguoi_dung' => 4,
                'loai_ma'       => 'kich_hoat_email',
                'ma_hash'       => Hash::make('123456'),
                'het_han_luc'   => now()->addMinutes(15),
                'da_su_dung'    => true,
                'so_lan_thu'    => 1,
                'ngay_tao'      => now(),
            ],
            [
                'ma_xac_thuc'   => 2,
                'ma_nguoi_dung' => 5,
                'loai_ma'       => 'dat_lai_mat_khau',
                'ma_hash'       => Hash::make('654321'),
                'het_han_luc'   => now()->addMinutes(30),
                'da_su_dung'    => false,
                'so_lan_thu'    => 0,
                'ngay_tao'      => now(),
            ],
        ]);
    }
}