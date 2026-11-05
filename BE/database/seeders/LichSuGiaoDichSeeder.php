<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichSuGiaoDichSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lich_su_giao_dich')->insert([
            [
                'ma_giao_dich_noi_bo' => 1,
                'ma_hoa_don'          => 1,
                'ma_giao_dich_goc'    => null,
                'ma_giao_dich_cong'   => 'VNP148291039',
                'ma_yeu_cau'          => 'REQ_VNP_20261024_001',
                'loai_giao_dich'      => 'thanh_toan',
                'phuong_thuc'         => 'vnpay',
                'so_tien'             => 2300000.00,
                'nguoi_xac_nhan_id'   => null,
                'trang_thai'          => 'thanh_cong',
                'phan_hoi_cong'       => '{"vnp_ResponseCode":"00","vnp_TransactionNo":"148291039"}',
                'ngay_tao'            => now()->subDays(2),
                'ngay_hoan_tat'       => now()->subDays(2),
            ],
        ]);
    }
}