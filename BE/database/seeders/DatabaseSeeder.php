<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Tắt Foreign Key Checks để truncate an toàn
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('nhat_ky_nghiep_vu')->truncate();
        DB::table('thong_bao')->truncate();
        DB::table('cau_hinh_he_thong')->truncate();
        DB::table('bao_cao_vi_pham')->truncate();
        DB::table('hinh_anh')->truncate();
        DB::table('danh_gia')->truncate();
        DB::table('khach_tham_gia_tour')->truncate();
        DB::table('lich_su_giao_dich')->truncate();
        DB::table('chi_tiet_hoa_don')->truncate();
        DB::table('hoa_don')->truncate();
        DB::table('dat_tour')->truncate();
        DB::table('voucher_tour')->truncate();
        DB::table('voucher')->truncate();
        DB::table('chinh_sach_huy_tour')->truncate();
        DB::table('lich_khoi_hanh')->truncate();
        DB::table('tuyen_diem_tour')->truncate();
        DB::table('tour_du_lich')->truncate();
        DB::table('chi_tiet_lich_trinh')->truncate();
        DB::table('lich_trinh')->truncate();
        DB::table('ma_tran_khoang_cach')->truncate();
        DB::table('dia_diem_yeu_thich')->truncate();
        DB::table('so_thich_du_khach')->truncate();
        DB::table('dia_diem_the')->truncate();
        DB::table('dia_diem')->truncate();
        DB::table('the_so_thich')->truncate();
        DB::table('danh_muc_dia_diem')->truncate();
        DB::table('xa_phuong')->truncate();
        DB::table('quan_huyen')->truncate();
        DB::table('tinh_thanh')->truncate();
        DB::table('phien_dang_nhap')->truncate();
        DB::table('xac_thuc_nguoi_dung')->truncate();
        DB::table('ho_so_doi_tac')->truncate();
        DB::table('phan_quyen')->truncate();
        DB::table('chuc_vu_chuc_nang')->truncate();
        DB::table('chuc_nang')->truncate();
        DB::table('chuc_vu')->truncate();
        DB::table('nguoi_dung')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Chạy lần lượt các Seeder theo thứ tự phụ thuộc dữ liệu
        $this->call([
            NguoiDungSeeder::class,
            ChucVuSeeder::class,
            ChucNangSeeder::class,
            ChucVuChucNangSeeder::class,
            PhanQuyenSeeder::class,
            HoSoDoiTacSeeder::class,
            XacThucNguoiDungSeeder::class,
            PhienDangNhapSeeder::class,
            TinhThanhSeeder::class,
            QuanHuyenSeeder::class,
            XaPhuongSeeder::class,
            DanhMucDiaDiemSeeder::class,
            TheSoThichSeeder::class,
            DiaDiemSeeder::class,
            DiaDiemTheSeeder::class,
            SoThichDuKhachSeeder::class,
            DiaDiemYeuThichSeeder::class,
            MaTranKhoangCachSeeder::class,
            LichTrinhSeeder::class,
            ChiTietLichTrinhSeeder::class,
            TourDuLichSeeder::class,
            TuyenDiemTourSeeder::class,
            LichKhoiHanhSeeder::class,
            ChinhSachHuyTourSeeder::class,
            VoucherSeeder::class,
            VoucherTourSeeder::class,
            DatTourSeeder::class,
            HoaDonSeeder::class,
            ChiTietHoaDonSeeder::class,
            LichSuGiaoDichSeeder::class,
            KhachThamGiaTourSeeder::class,
            DanhGiaSeeder::class,
            HinhAnhSeeder::class,
            BaoCaoViPhamSeeder::class,
            CauHinhHeThongSeeder::class,
            ThongBaoSeeder::class,
            NhatKyNghiepVuSeeder::class,
        ]);
    }
}
