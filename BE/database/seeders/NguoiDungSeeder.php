<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nguoi_dung')->insert([
            [
                'ma_nguoi_dung' => 1,
                'ho_ten'        => 'Quản Trị Viên Hệ Thống',
                'email'         => 'admin@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0901000001',
                'anh_dai_dien'  => 'https://ui-avatars.com/api/?name=Admin',
                'trang_thai'    => 'hoat_dong',
                'ngay_tao'      => now(),
                'ngay_cap_nhat' => now(),
            ],
            [
                'ma_nguoi_dung' => 2,
                'ho_ten'        => 'Công ty Du Lịch Việt Discovery',
                'email'         => 'doitac1@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0902000002',
                'anh_dai_dien'  => 'https://ui-avatars.com/api/?name=VietDiscovery',
                'trang_thai'    => 'hoat_dong',
                'ngay_tao'      => now(),
                'ngay_cap_nhat' => now(),
            ],
            [
                'ma_nguoi_dung' => 3,
                'ho_ten'        => 'Lữ Hành Sài Gòn Tourist Partner',
                'email'         => 'doitac2@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0903000003',
                'anh_dai_dien'  => 'https://ui-avatars.com/api/?name=SaigonTourist',
                'trang_thai'    => 'hoat_dong',
                'ngay_tao'      => now(),
                'ngay_cap_nhat' => now(),
            ],
            [
                'ma_nguoi_dung' => 4,
                'ho_ten'        => 'Nguyễn Văn An',
                'email'         => 'nguyenvanan@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0904000004',
                'anh_dai_dien'  => 'https://ui-avatars.com/api/?name=Nguyen+Van+An',
                'trang_thai'    => 'hoat_dong',
                'ngay_tao'      => now(),
                'ngay_cap_nhat' => now(),
            ],
            [
                'ma_nguoi_dung' => 5,
                'ho_ten'        => 'Trần Thị Bình',
                'email'         => 'tranthibinh@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0905000005',
                'anh_dai_dien'  => 'https://ui-avatars.com/api/?name=Tran+Thi+Binh',
                'trang_thai'    => 'hoat_dong',
                'ngay_tao'      => now(),
                'ngay_cap_nhat' => now(),
            ],
        ]);
    }
}