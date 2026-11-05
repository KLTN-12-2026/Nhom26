<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinhThanhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tinh_thanh')->insert([
            ['ma_tinh' => '01', 'ten_tinh' => 'Thành phố Hà Nội', 'loai_don_vi' => 'thanh_pho', 'dang_hoat_dong' => true],
            ['ma_tinh' => '48', 'ten_tinh' => 'Thành phố Đà Nẵng', 'loai_don_vi' => 'thanh_pho', 'dang_hoat_dong' => true],
            ['ma_tinh' => '68', 'ten_tinh' => 'Tỉnh Lâm Đồng', 'loai_don_vi' => 'tinh', 'dang_hoat_dong' => true],
            ['ma_tinh' => '79', 'ten_tinh' => 'Thành phố Hồ Chí Minh', 'loai_don_vi' => 'thanh_pho', 'dang_hoat_dong' => true],
            ['ma_tinh' => '56', 'ten_tinh' => 'Tỉnh Khánh Hòa', 'loai_don_vi' => 'tinh', 'dang_hoat_dong' => true],
        ]);
    }
}