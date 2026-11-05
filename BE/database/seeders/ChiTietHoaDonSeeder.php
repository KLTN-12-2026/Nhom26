<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietHoaDonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_hoa_don')->insert([
            // Hóa đơn 1 (2 vé người lớn + giảm giá voucher)
            [
                'ma_chi_tiet'    => 1,
                'ma_hoa_don'     => 1,
                'ten_khoan_muc'  => 'Vé Tour Bà Nà Hills - Cầu Vàng (Người lớn)',
                'loai_khoan_muc' => 'gia_goc',
                'loai_khach'     => 'nguoi_lon',
                'so_luong'       => 2,
                'don_gia'        => 1250000.00,
                'thanh_tien'     => 2500000.00,
            ],
            [
                'ma_chi_tiet'    => 2,
                'ma_hoa_don'     => 1,
                'ten_khoan_muc'  => 'Khuyến mãi Voucher HELLOVN10',
                'loai_khoan_muc' => 'giam_gia',
                'loai_khach'     => null,
                'so_luong'       => 1,
                'don_gia'        => -200000.00,
                'thanh_tien'     => -200000.00,
            ],
            // Hóa đơn 2 (1 vé người lớn)
            [
                'ma_chi_tiet'    => 3,
                'ma_hoa_don'     => 2,
                'ten_khoan_muc'  => 'Vé Tour Đà Lạt Mộng Mơ 3N2Đ (Người lớn)',
                'loai_khoan_muc' => 'gia_goc',
                'loai_khach'     => 'nguoi_lon',
                'so_luong'       => 1,
                'don_gia'        => 2850000.00,
                'thanh_tien'     => 2850000.00,
            ],
        ]);
    }
}