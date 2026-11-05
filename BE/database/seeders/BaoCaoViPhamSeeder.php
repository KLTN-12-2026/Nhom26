<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaoCaoViPhamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bao_cao_vi_pham')->insert([
            [
                'ma_bao_cao'       => 1,
                'nguoi_bao_cao_id' => 5,
                'ma_dia_diem'      => 5,
                'ma_tour'          => null,
                'ma_danh_gia'      => null,
                'loai_ly_do'       => 'sai_thong_tin',
                'mo_ta'            => 'Giá giữ xe và một số sạp hàng ẩm thực niêm yết giá chưa chính xác.',
                'trang_thai_xu_ly' => 'da_xu_ly',
                'nguoi_xu_ly_id'   => 1,
                'ket_qua_xu_ly'    => 'Đã liên hệ ban quản lý xác minh và cập nhật mô tả ghi chú.',
                'ngay_xu_ly'       => now()->subDay(),
                'ngay_tao'         => now()->subDays(3),
                'ngay_cap_nhat'    => now()->subDay(),
            ],
        ]);
    }
}