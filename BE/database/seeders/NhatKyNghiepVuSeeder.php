<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhatKyNghiepVuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nhat_ky_nghiep_vu')->insert([
            [
                'ma_nhat_ky'         => 1,
                'ma_nguoi_thuc_hien' => 1,
                'ma_doi_tac'         => 1,
                'ma_dia_diem'        => null,
                'ma_tour'            => null,
                'ma_danh_gia'        => null,
                'ma_dat_tour'        => null,
                'trang_thai_cu'      => 'cho_duyet',
                'trang_thai_moi'     => 'da_duyet',
                'hanh_dong'          => 'phe_duyet',
                'ly_do'              => 'Hồ sơ pháp lý doanh nghiệp đầy đủ hợp lệ',
                'ngay_tao'           => now()->subDays(10),
            ],
            [
                'ma_nhat_ky'         => 2,
                'ma_nguoi_thuc_hien' => 1,
                'ma_doi_tac'         => null,
                'ma_dia_diem'        => null,
                'ma_tour'            => 1,
                'ma_danh_gia'        => null,
                'ma_dat_tour'        => null,
                'trang_thai_cu'      => 'cho_duyet',
                'trang_thai_moi'     => 'da_duyet',
                'hanh_dong'          => 'phe_duyet',
                'ly_do'              => 'Lộ trình và giá tour phù hợp chính sách sàn',
                'ngay_tao'           => now()->subDays(5),
            ],
            [
                'ma_nhat_ky'         => 3,
                'ma_nguoi_thuc_hien' => 2,
                'ma_doi_tac'         => null,
                'ma_dia_diem'        => null,
                'ma_tour'            => null,
                'ma_danh_gia'        => null,
                'ma_dat_tour'        => 1,
                'trang_thai_cu'      => 'cho_xac_nhan',
                'trang_thai_moi'     => 'da_xac_nhan',
                'hanh_dong'          => 'doi_trang_thai',
                'ly_do'              => 'Khách hàng đã thanh toán hóa đơn đầy đủ',
                'ngay_tao'           => now()->subDay(),
            ],
        ]);
    }
}