<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachThamGiaTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('khach_tham_gia_tour')->insert([
            [
                'ma_khach'      => 1,
                'ma_dat_tour'   => 1,
                'ho_ten'        => 'Nguyễn Văn An',
                'so_dien_thoai' => '0904000004',
                'loai_khach'    => 'nguoi_lon',
                'ghi_chu'       => 'Trưởng nhóm',
            ],
            [
                'ma_khach'      => 2,
                'ma_dat_tour'   => 1,
                'ho_ten'        => 'Phạm Thị Lan',
                'so_dien_thoai' => '0904000005',
                'loai_khach'    => 'nguoi_lon',
                'ghi_chu'       => 'Người đi cùng',
            ],
            [
                'ma_khach'      => 3,
                'ma_dat_tour'   => 2,
                'ho_ten'        => 'Trần Thị Bình',
                'so_dien_thoai' => '0905000005',
                'loai_khach'    => 'nguoi_lon',
                'ghi_chu'       => null,
            ],
        ]);
    }
}