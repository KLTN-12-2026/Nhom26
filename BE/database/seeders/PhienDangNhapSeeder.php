<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhienDangNhapSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('phien_dang_nhap')->insert([
            [
                'ma_phien'           => 1,
                'ma_nguoi_dung'      => 4,
                'refresh_token_hash' => hash('sha256', 'sample_refresh_token_user_4'),
                'thiet_bi'           => 'Chrome 120 on Windows 11',
                'ip_address'         => '127.0.0.1',
                'het_han_luc'        => now()->addDays(7),
                'ngay_thu_hoi'       => null,
                'ngay_tao'           => now(),
            ],
            [
                'ma_phien'           => 2,
                'ma_nguoi_dung'      => 5,
                'refresh_token_hash' => hash('sha256', 'sample_refresh_token_user_5'),
                'thiet_bi'           => 'Safari on iPhone 15 Pro',
                'ip_address'         => '127.0.0.1',
                'het_han_luc'        => now()->addDays(7),
                'ngay_thu_hoi'       => null,
                'ngay_tao'           => now(),
            ],
        ]);
    }
}