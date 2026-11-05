<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuanHuyenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('quan_huyen')->insert([
            ['ma_huyen' => '001', 'ma_tinh' => '01', 'ten_huyen' => 'Quận Ba Đình', 'loai_don_vi' => 'quan', 'ngay_ngung_hoat_dong' => null],
            ['ma_huyen' => '002', 'ma_tinh' => '01', 'ten_huyen' => 'Quận Hoàn Kiếm', 'loai_don_vi' => 'quan', 'ngay_ngung_hoat_dong' => null],
            ['ma_huyen' => '490', 'ma_tinh' => '48', 'ten_huyen' => 'Quận Hải Châu', 'loai_don_vi' => 'quan', 'ngay_ngung_hoat_dong' => null],
            ['ma_huyen' => '492', 'ma_tinh' => '48', 'ten_huyen' => 'Quận Sơn Trà', 'loai_don_vi' => 'quan', 'ngay_ngung_hoat_dong' => null],
            ['ma_huyen' => '672', 'ma_tinh' => '68', 'ten_huyen' => 'Thành phố Đà Lạt', 'loai_don_vi' => 'thanh_pho_thuoc_tinh', 'ngay_ngung_hoat_dong' => null],
            ['ma_huyen' => '760', 'ma_tinh' => '79', 'ten_huyen' => 'Quận 1', 'loai_don_vi' => 'quan', 'ngay_ngung_hoat_dong' => null],
        ]);
    }
}