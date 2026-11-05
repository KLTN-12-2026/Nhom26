<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        $records = [];
        $id = 1;
        // User 1 (Admin)
        for ($i = 1; $i <= 10; $i++) {
            $records[] = [
                'ma_phan_quyen' => $id++,
                'ma_nguoi_dung' => 1,
                'ma_chuc_vu'    => 1,
                'ma_chuc_nang'  => $i,
            ];
        }
        // User 2 (Đối tác Viet Discovery)
        foreach ([4, 6, 8, 9] as $cn) {
            $records[] = [
                'ma_phan_quyen' => $id++,
                'ma_nguoi_dung' => 2,
                'ma_chuc_vu'    => 2,
                'ma_chuc_nang'  => $cn,
            ];
        }
        // User 3 (Đối tác Saigon Tourist Partner)
        foreach ([4, 6, 8, 9] as $cn) {
            $records[] = [
                'ma_phan_quyen' => $id++,
                'ma_nguoi_dung' => 3,
                'ma_chuc_vu'    => 2,
                'ma_chuc_nang'  => $cn,
            ];
        }

        DB::table('phan_quyen')->insert($records);
    }
}