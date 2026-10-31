<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chuc_vu')->insert([
            [
                'ma_chuc_vu'  => 1,
                'ten_chuc_vu' => 'quan_tri_vien',
                'mo_ta'       => 'Quản trị viên toàn hệ thống, toàn quyền quản lý',
            ],
            [
                'ma_chuc_vu'  => 2,
                'ten_chuc_vu' => 'doi_tac',
                'mo_ta'       => 'Đối tác doanh nghiệp du lịch, tạo và quản lý tour',
            ],
            [
                'ma_chuc_vu'  => 3,
                'ten_chuc_vu' => 'du_khach',
                'mo_ta'       => 'Người dùng du khách sử dụng hệ thống lên lịch trình và đặt tour',
            ],
        ]);
    }
}