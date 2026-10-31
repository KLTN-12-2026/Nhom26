<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuChucNangSeeder extends Seeder
{
    public function run(): void
    {
        $records = [];
        // Admin: 1..10
        for ($i = 1; $i <= 10; $i++) {
            $records[] = ['ma_chuc_vu' => 1, 'ma_chuc_nang' => $i];
        }
        // DoiTac: tour (4, 9), voucher (8), dia_diem (6)
        $records[] = ['ma_chuc_vu' => 2, 'ma_chuc_nang' => 4];
        $records[] = ['ma_chuc_vu' => 2, 'ma_chuc_nang' => 6];
        $records[] = ['ma_chuc_vu' => 2, 'ma_chuc_nang' => 8];
        $records[] = ['ma_chuc_vu' => 2, 'ma_chuc_nang' => 9];

        DB::table('chuc_vu_chuc_nang')->insert($records);
    }
}