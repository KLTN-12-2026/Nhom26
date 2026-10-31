<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongBaoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('thong_bao')->insert([
            [
                'ma_thong_bao'       => 1,
                'ma_nguoi_nhan'      => 4,
                'tieu_de'            => 'Xác nhận đặt tour thành công',
                'noi_dung'           => 'Đơn hàng ORD20261024001 của bạn đã được đối tác xác nhận. Chúc bạn có chuyến đi vui vẻ!',
                'loai_thong_bao'     => 'dat_tour',
                'duong_dan_lien_ket' => '/don-hang/ORD20261024001',
                'da_doc'             => true,
                'ngay_tao'           => now()->subDay(),
            ],
            [
                'ma_thong_bao'       => 2,
                'ma_nguoi_nhan'      => 2,
                'tieu_de'            => 'Có đơn đặt tour mới',
                'noi_dung'           => 'Khách hàng Nguyễn Văn An vừa đặt Tour VIP Bà Nà Hills. Vui lòng kiểm tra và chuẩn bị đón tiếp.',
                'loai_thong_bao'     => 'dat_tour',
                'duong_dan_lien_ket' => '/doi-tac/don-hang/1',
                'da_doc'             => false,
                'ngay_tao'           => now()->subDays(2),
            ],
            [
                'ma_thong_bao'       => 3,
                'ma_nguoi_nhan'      => 5,
                'tieu_de'            => 'Nhắc nhở hoàn tất thanh toán',
                'noi_dung'           => 'Đơn hàng ORD20261024002 của bạn sẽ hết hạn giữ chỗ sau 24 giờ.',
                'loai_thong_bao'     => 'nhac_nho',
                'duong_dan_lien_ket' => '/thanh-toan/hoa-don/2',
                'da_doc'             => false,
                'ngay_tao'           => now(),
            ],
        ]);
    }
}