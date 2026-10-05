<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại trước khi truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Danh sách các bảng cần truncate
        $tables = [
            'hanh_vi_nguoi_dungs', 'ly_do_hanh_vis', 'phan_hois', 'yeu_thichs', 'danh_gia_tours',
            'doi_soat_hoa_hongs', 'thanh_toans', 'chi_tiet_hoa_dons', 'hoa_dons', 'vouchers',
            'hoat_dong_chi_tiets', 'yeu_cau_ais', 'ke_hoachs', 'thanh_vien_nhoms', 'nhoms',
            'dich_vus', 'chi_tiet_tours', 'tour_khoi_hanhs', 'hinh_anh_tours', 'tours',
            'hinh_anh_dia_diems', 'dia_diems', 'so_thichs', 'tags', 'phan_quyen_admins',
            'chuc_nangs', 'khach_hangs', 'doi_tacs', 'admins', 'chuc_vus'
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Gọi các seeder theo thứ tự (bảng không có khóa ngoại trước)
        $this->call([
            ChucVuSeeder::class,
            AdminSeeder::class,
            DoiTacSeeder::class,
            KhachHangSeeder::class,
            ChucNangSeeder::class,
            PhanQuyenAdminSeeder::class,
            TagSeeder::class,
            SoThichSeeder::class,
            DiaDiemSeeder::class,
            HinhAnhDiaDiemSeeder::class,
            TourSeeder::class,
            HinhAnhTourSeeder::class,
            TourKhoiHanhSeeder::class,
            ChiTietTourSeeder::class,
            DichVuSeeder::class,
            NhomSeeder::class,
            ThanhVienNhomSeeder::class,
            KeHoachSeeder::class,
            YeuCauAiSeeder::class,
            HoatDongChiTietSeeder::class,
            VoucherSeeder::class,
            HoaDonSeeder::class,
            ChiTietHoaDonSeeder::class,
            ThanhToanSeeder::class,
            DoiSoatHoaHongSeeder::class,
            DanhGiaTourSeeder::class,
            YeuThichSeeder::class,
            PhanHoiSeeder::class,
            LyDoHanhViSeeder::class,
            HanhViNguoiDungSeeder::class,
        ]);
    }
}