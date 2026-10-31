<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dat_tour')->insert([
            [
                'ma_dat_tour'          => 1,
                'ma_don_hang'          => 'ORD20261024001',
                'ma_nguoi_dung'        => 4,
                'ma_lich_khoi_hanh'    => 1,
                'ma_voucher'           => 1,
                'ngay_ap_dung_voucher' => now()->subDay(),
                'so_nguoi'             => 2,
                'tong_tien'            => 2500000.00,
                'so_tien_giam'         => 200000.00,
                'thanh_tien'           => 2300000.00,
                'trang_thai'           => 'da_xac_nhan',
                'ghi_chu'              => 'Đón tại sảnh khách sạn Novotel',
                'ly_do_tu_choi'        => null,
                'ly_do_huy'            => null,
                'ngay_huy'             => null,
                'het_han_giu_cho'      => null,
                'phien_ban_chinh_sach' => 1,
                'ti_le_hoan_chot'      => null,
                'so_tien_hoan_lai'     => 0.00,
                'nguoi_xu_ly_id'       => 2,
                'ngay_xu_ly'           => now()->subDay(),
                'ngay_dat'             => now()->subDays(2),
                'ngay_cap_nhat'        => now()->subDay(),
            ],
            [
                'ma_dat_tour'          => 2,
                'ma_don_hang'          => 'ORD20261024002',
                'ma_nguoi_dung'        => 5,
                'ma_lich_khoi_hanh'    => 3,
                'ma_voucher'           => null,
                'ngay_ap_dung_voucher' => null,
                'so_nguoi'             => 1,
                'tong_tien'            => 2850000.00,
                'so_tien_giam'         => 0.00,
                'thanh_tien'           => 2850000.00,
                'trang_thai'           => 'cho_xac_nhan',
                'ghi_chu'              => 'Yêu cầu phòng không hút thuốc',
                'ly_do_tu_choi'        => null,
                'ly_do_huy'            => null,
                'ngay_huy'             => null,
                'het_han_giu_cho'      => now()->addHours(24),
                'phien_ban_chinh_sach' => 1,
                'ti_le_hoan_chot'      => null,
                'so_tien_hoan_lai'     => 0.00,
                'nguoi_xu_ly_id'       => null,
                'ngay_xu_ly'           => null,
                'ngay_dat'             => now(),
                'ngay_cap_nhat'        => null,
            ],
        ]);
    }
}