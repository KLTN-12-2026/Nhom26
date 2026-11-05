<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('danh_gia')->insert([
            [
                'ma_danh_gia'        => 1,
                'ma_nguoi_dung'      => 4,
                'ma_dia_diem'        => 1,
                'ma_tour'            => null,
                'ma_dat_tour'        => null,
                'so_sao'             => 5,
                'noi_dung'           => 'Cầu Vàng và Làng Pháp rất đẹp, không khí mát mẻ như trời Âu.',
                'trang_thai'         => 'hien_thi',
                'nguoi_kiem_duyet_id'=> 1,
                'ngay_kiem_duyet'    => now()->subDay(),
                'ly_do_an'           => null,
                'ngay_tao'           => now()->subDays(2),
            ],
            [
                'ma_danh_gia'        => 2,
                'ma_nguoi_dung'      => 4,
                'ma_dia_diem'        => null,
                'ma_tour'            => 1,
                'ma_dat_tour'        => 1,
                'so_sao'             => 5,
                'noi_dung'           => 'Dịch vụ của đối tác Viet Discovery rất tuyệt vời, hướng dẫn viên nhiệt tình, buffet trưa ngon miệng!',
                'trang_thai'         => 'hien_thi',
                'nguoi_kiem_duyet_id'=> 1,
                'ngay_kiem_duyet'    => now()->subDay(),
                'ly_do_an'           => null,
                'ngay_tao'           => now()->subDay(),
            ],
        ]);
    }
}