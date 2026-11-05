<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDuLichSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tour_du_lich')->insert([
            [
                'ma_tour'                => 1,
                'ma_doi_tac'             => 1,
                'ten_tour'               => 'Tour VIP Bà Nà Hills - Cầu Vàng - Buffet Làng Pháp 1 Ngày',
                'mo_ta'                  => 'Trải nghiệm cáp treo đạt nhiều kỷ lục thế giới, check-in Cầu Vàng hùng vĩ và thưởng thức tiệc buffet quốc tế hơn 100 món.',
                'so_ngay'                => 1,
                'gia_nguoi_lon'          => 1250000.00,
                'gia_tre_em'             => 850000.00,
                'gia_em_be'              => 0.00,
                'diem_tap_trung'         => 'Khách sạn Novotel Danang Premier Han River, 36 Bạch Đằng',
                'vi_do_tap_trung'        => 16.07480000,
                'kinh_do_tap_trung'       => 108.22350000,
                'noi_dung_bao_gom'       => 'Xe đưa đón đời mới, vé cáp treo khứ hồi, vé buffet trưa, hướng dẫn viên, nước suối, bảo hiểm du lịch.',
                'noi_dung_khong_bao_gom' => 'Chi phí cá nhân ngoài chương trình, tiền tip cho HDV và tài xế.',
                'trang_thai_duyet'       => 'da_duyet',
                'nguoi_duyet_id'         => 1,
                'ly_do_tu_choi'          => null,
                'ngay_tao'               => now(),
                'ngay_cap_nhat'          => now(),
            ],
            [
                'ma_tour'                => 2,
                'ma_doi_tac'             => 2,
                'ten_tour'               => 'Tour Trọn Gói Đà Lạt Mộng Mơ - Săn Mây Cầu Đất 3N2Đ',
                'mo_ta'                  => 'Chuyến nghỉ dưỡng nhẹ nhàng hòa mình cùng thiên nhiên xứ hoa, ngắm bình minh trên đồi chè Cầu Đất và tham quan các dinh thự lịch sử.',
                'so_ngay'                => 3,
                'gia_nguoi_lon'          => 2850000.00,
                'gia_tre_em'             => 1950000.00,
                'gia_em_be'              => 0.00,
                'diem_tap_trung'         => 'Bến xe Liên Tỉnh Đà Lạt, 01 Tô Hiến Thành, Phường 3',
                'vi_do_tap_trung'        => 11.92500000,
                'kinh_do_tap_trung'       => 108.44100000,
                'noi_dung_bao_gom'       => 'Khách sạn tiêu chuẩn 3 sao, xe đưa đón theo tour, vé các điểm tham quan, các bữa ăn chính.',
                'noi_dung_khong_bao_gom' => 'Vé máy bay khứ hồi, chi phí phòng đơn phát sinh.',
                'trang_thai_duyet'       => 'da_duyet',
                'nguoi_duyet_id'         => 1,
                'ly_do_tu_choi'          => null,
                'ngay_tao'               => now(),
                'ngay_cap_nhat'          => now(),
            ],
        ]);
    }
}