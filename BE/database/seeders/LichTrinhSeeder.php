<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichTrinhSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lich_trinh')->insert([
            [
                'ma_lich_trinh'        => 1,
                'ma_nguoi_dung'        => 4,
                'ma_lich_trinh_goc'    => null,
                'la_cong_khai'         => true,
                'ten_lich_trinh'       => 'Hành trình khám phá Đà Nẵng mùa lễ hội',
                'ngay_bat_dau'         => '2026-11-10',
                'ngay_ket_thuc'        => '2026-11-12',
                'tong_ngan_sach'       => 3500000.00,
                'so_nguoi'             => 2,
                'phuong_tien'          => 'xe_may',
                'nhip_do'              => 'vua_phai',
                'tong_chi_phi_du_kien' => 3100000.00,
                'ti_le_phu_hop'        => 92.50,
                'trang_thai'           => 'da_luu',
                'ngay_tao'             => now(),
                'ngay_cap_nhat'        => now(),
            ],
            [
                'ma_lich_trinh'        => 2,
                'ma_nguoi_dung'        => 5,
                'ma_lich_trinh_goc'    => null,
                'la_cong_khai'         => false,
                'ten_lich_trinh'       => 'Trốn nóng Đà Lạt - Thưởng thức sương sớm',
                'ngay_bat_dau'         => '2026-11-15',
                'ngay_ket_thuc'        => '2026-11-17',
                'tong_ngan_sach'       => 4000000.00,
                'so_nguoi'             => 1,
                'phuong_tien'          => 'xe_may',
                'nhip_do'              => 'thu_tha',
                'tong_chi_phi_du_kien' => 3600000.00,
                'ti_le_phu_hop'        => 88.00,
                'trang_thai'           => 'da_luu',
                'ngay_tao'             => now(),
                'ngay_cap_nhat'        => now(),
            ],
        ]);
    }
}