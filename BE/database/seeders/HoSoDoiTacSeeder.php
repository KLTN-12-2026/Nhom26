<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoSoDoiTacSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ho_so_doi_tac')->insert([
            [
                'ma_doi_tac'               => 1,
                'ma_nguoi_dung'            => 2,
                'ten_cong_ty'              => 'Công ty TNHH Du Lịch Việt Discovery',
                'ma_so_thue'               => '0108123456',
                'giay_phep_kinh_doanh_url' => 'https://storage.travel.vn/gp/gp_vietdiscovery.pdf',
                'dia_chi'                  => 'Tầng 5, Tòa nhà Discovery, 123 Lê Duẩn, Hải Châu, Đà Nẵng',
                'email_lien_he'            => 'contact@vietdiscovery.vn',
                'so_dien_thoai'            => '02363888999',
                'trang_thai_duyet'         => 'da_duyet',
                'ngay_duyet'               => now(),
                'ly_do_tu_choi'            => null,
                'nguoi_duyet_id'           => 1,
                'ngay_tao'                 => now(),
                'ngay_cap_nhat'            => now(),
            ],
            [
                'ma_doi_tac'               => 2,
                'ma_nguoi_dung'            => 3,
                'ten_cong_ty'              => 'Công ty Cổ Phần Lữ Hành Sài Gòn Tourist Partner',
                'ma_so_thue'               => '0309988776',
                'giay_phep_kinh_doanh_url' => 'https://storage.travel.vn/gp/gp_saigontourist.pdf',
                'dia_chi'                  => '45 Lê Thánh Tôn, Bến Nghé, Quận 1, TP. Hồ Chí Minh',
                'email_lien_he'            => 'booking@saigontourist-partner.vn',
                'so_dien_thoai'            => '02838222333',
                'trang_thai_duyet'         => 'da_duyet',
                'ngay_duyet'               => now(),
                'ly_do_tu_choi'            => null,
                'nguoi_duyet_id'           => 1,
                'ngay_tao'                 => now(),
                'ngay_cap_nhat'            => now(),
            ],
        ]);
    }
}