<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chuc_nang')->insert([
            [
                'ma_chuc_nang'   => 1,
                'ten_chuc_nang'  => 'quan_ly_nguoi_dung',
                'nhom_chuc_nang' => 'nguoi_dung',
                'mo_ta'          => 'Xem và quản lý tài khoản người dùng',
            ],
            [
                'ma_chuc_nang'   => 2,
                'ten_chuc_nang'  => 'quan_ly_phan_quyen',
                'nhom_chuc_nang' => 'nguoi_dung',
                'mo_ta'          => 'Phân quyền chức vụ và chức năng',
            ],
            [
                'ma_chuc_nang'   => 3,
                'ten_chuc_nang'  => 'duyet_doi_tac',
                'nhom_chuc_nang' => 'nguoi_dung',
                'mo_ta'          => 'Phê duyệt hồ sơ đăng ký đối tác du lịch',
            ],
            [
                'ma_chuc_nang'   => 4,
                'ten_chuc_nang'  => 'quan_ly_tour',
                'nhom_chuc_nang' => 'tour',
                'mo_ta'          => 'Thêm, sửa, xóa thông tin tour du lịch',
            ],
            [
                'ma_chuc_nang'   => 5,
                'ten_chuc_nang'  => 'duyet_tour',
                'nhom_chuc_nang' => 'tour',
                'mo_ta'          => 'Phê duyệt tour đối tác đề xuất lên sàn',
            ],
            [
                'ma_chuc_nang'   => 6,
                'ten_chuc_nang'  => 'quan_ly_dia_diem',
                'nhom_chuc_nang' => 'dia_diem',
                'mo_ta'          => 'Thêm, sửa thông tin điểm du lịch',
            ],
            [
                'ma_chuc_nang'   => 7,
                'ten_chuc_nang'  => 'duyet_dia_diem',
                'nhom_chuc_nang' => 'dia_diem',
                'mo_ta'          => 'Kiểm duyệt điểm đến mới',
            ],
            [
                'ma_chuc_nang'   => 8,
                'ten_chuc_nang'  => 'quan_ly_voucher',
                'nhom_chuc_nang' => 'voucher',
                'mo_ta'          => 'Tạo và phát hành mã giảm giá',
            ],
            [
                'ma_chuc_nang'   => 9,
                'ten_chuc_nang'  => 'quan_ly_dat_tour',
                'nhom_chuc_nang' => 'tour',
                'mo_ta'          => 'Xác nhận và quản lý đơn đặt tour',
            ],
            [
                'ma_chuc_nang'   => 10,
                'ten_chuc_nang'  => 'cau_hinh_he_thong',
                'nhom_chuc_nang' => 'he_thong',
                'mo_ta'          => 'Thiết lập tham số thuật toán và cấu hình',
            ],
        ]);
    }
}