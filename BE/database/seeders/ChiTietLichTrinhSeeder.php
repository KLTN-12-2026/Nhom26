<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietLichTrinhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_lich_trinh')->insert([
            [
                'ma_chi_tiet'           => 1,
                'ma_lich_trinh'         => 1,
                'ma_dia_diem'           => 1,
                'ngay_thu_may'          => 1,
                'thu_tu'                => 1,
                'gio_den_du_kien'       => '08:00:00',
                'gio_roi_du_kien'       => '14:30:00',
                'thoi_gian_di_chuyen'   => 45,
                'khoang_cach_di_chuyen' => 35000,
                'hinh_hoc_tuyen_duong'  => null,
                'chi_phi_du_kien'       => 900000.00,
                'khoa_diem'             => true,
                'ghi_chu'               => 'Ăn trưa buffet tại Làng Pháp',
            ],
            [
                'ma_chi_tiet'           => 2,
                'ma_lich_trinh'         => 1,
                'ma_dia_diem'           => 2,
                'ngay_thu_may'          => 1,
                'thu_tu'                => 2,
                'gio_den_du_kien'       => '15:30:00',
                'gio_roi_du_kien'       => '17:30:00',
                'thoi_gian_di_chuyen'   => 30,
                'khoang_cach_di_chuyen' => 20000,
                'hinh_hoc_tuyen_duong'  => null,
                'chi_phi_du_kien'       => 0.00,
                'khoa_diem'             => false,
                'ghi_chu'               => 'Ngắm hoàng hôn bán đảo Sơn Trà',
            ],
            [
                'ma_chi_tiet'           => 3,
                'ma_lich_trinh'         => 2,
                'ma_dia_diem'           => 3,
                'ngay_thu_may'          => 1,
                'thu_tu'                => 1,
                'gio_den_du_kien'       => '07:00:00',
                'gio_roi_du_kien'       => '09:00:00',
                'thoi_gian_di_chuyen'   => 15,
                'khoang_cach_di_chuyen' => 3000,
                'hinh_hoc_tuyen_duong'  => null,
                'chi_phi_du_kien'       => 60000.00,
                'khoa_diem'             => false,
                'ghi_chu'               => 'Uống cafe sáng ngắm sương hồ',
            ],
        ]);
    }
}