<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class XaPhuongSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('xa_phuong')->insert([
            ['ma_xa' => '00001', 'ma_tinh' => '01', 'ten_xa' => 'Phường Điện Biên', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
            ['ma_xa' => '00037', 'ma_tinh' => '01', 'ten_xa' => 'Phường Tràng Tiền', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
            ['ma_xa' => '20198', 'ma_tinh' => '48', 'ten_xa' => 'Phường Hải Châu 1', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
            ['ma_xa' => '20210', 'ma_tinh' => '48', 'ten_xa' => 'Phường An Hải Bắc', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
            ['ma_xa' => '24784', 'ma_tinh' => '68', 'ten_xa' => 'Phường 1 (Đà Lạt)', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
            ['ma_xa' => '26734', 'ma_tinh' => '79', 'ten_xa' => 'Phường Bến Nghé', 'loai_don_vi' => 'phuong', 'dang_hoat_dong' => true],
        ]);
    }
}