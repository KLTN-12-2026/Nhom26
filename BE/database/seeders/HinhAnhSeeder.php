<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hinh_anh')->insert([
            // Ảnh địa điểm 1
            [
                'ma_hinh_anh'   => 1,
                'ma_dia_diem'   => 1,
                'ma_tour'       => null,
                'ma_danh_gia'   => null,
                'thu_tu'        => 1,
                'duong_dan_anh' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b',
                'la_anh_chinh'  => true,
            ],
            // Ảnh địa điểm 3 (Đà Lạt)
            [
                'ma_hinh_anh'   => 2,
                'ma_dia_diem'   => 3,
                'ma_tour'       => null,
                'ma_danh_gia'   => null,
                'thu_tu'        => 1,
                'duong_dan_anh' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb',
                'la_anh_chinh'  => true,
            ],
            // Ảnh tour 1
            [
                'ma_hinh_anh'   => 3,
                'ma_dia_diem'   => null,
                'ma_tour'       => 1,
                'ma_danh_gia'   => null,
                'thu_tu'        => 1,
                'duong_dan_anh' => 'https://images.unsplash.com/photo-1528127269322-539801943592',
                'la_anh_chinh'  => true,
            ],
            // Ảnh tour 2
            [
                'ma_hinh_anh'   => 4,
                'ma_dia_diem'   => null,
                'ma_tour'       => 2,
                'ma_danh_gia'   => null,
                'thu_tu'        => 1,
                'duong_dan_anh' => 'https://images.unsplash.com/photo-1570789210967-2cac24afeb00',
                'la_anh_chinh'  => true,
            ],
            // Ảnh đánh giá 2
            [
                'ma_hinh_anh'   => 5,
                'ma_dia_diem'   => null,
                'ma_tour'       => null,
                'ma_danh_gia'   => 2,
                'thu_tu'        => 1,
                'duong_dan_anh' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
                'la_anh_chinh'  => false,
            ],
        ]);
    }
}