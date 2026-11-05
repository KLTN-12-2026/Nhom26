<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('voucher')->insert([
            [
                'ma_voucher'            => 1,
                'nguoi_tao_id'          => 1,
                'ma_doi_tac'            => null,
                'ma_giam_gia'           => 'HELLOVN10',
                'loai_giam_gia'         => 'phan_tram',
                'gia_tri_giam'          => 10.00,
                'gia_tri_don_toi_thieu' => 1000000.00,
                'giam_toi_da'           => 200000.00,
                'ngay_bat_dau'          => now()->subDays(5),
                'ngay_ket_thuc'         => now()->addDays(60),
                'gioi_han_su_dung'      => 100,
                'so_lan_da_dung'        => 1,
                'trang_thai_kich_hoat'  => true,
                'ngay_tao'              => now(),
            ],
            [
                'ma_voucher'            => 2,
                'nguoi_tao_id'          => 2,
                'ma_doi_tac'            => 1,
                'ma_giam_gia'           => 'DISCOVERY500',
                'loai_giam_gia'         => 'tien_mat',
                'gia_tri_giam'          => 500000.00,
                'gia_tri_don_toi_thieu' => 3000000.00,
                'giam_toi_da'           => 500000.00,
                'ngay_bat_dau'          => now()->subDays(2),
                'ngay_ket_thuc'         => now()->addDays(30),
                'gioi_han_su_dung'      => 50,
                'so_lan_da_dung'        => 0,
                'trang_thai_kich_hoat'  => true,
                'ngay_tao'              => now(),
            ],
        ]);
    }
}