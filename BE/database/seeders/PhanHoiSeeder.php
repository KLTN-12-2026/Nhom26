<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhanHoiSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("phan_hois")->insert([
            ["id" => 1, "ma_khach_hang" => "KH003", "tieu_de" => "Lỗi không đặt được tour", "loai" => "LoiKyThuat", "mo_ta" => "Tôi chọn ngày nhưng hệ thống báo lỗi hết chỗ.", "trang_thai" => "DaXuLy", "ma_admin_xu_ly" => "AD03", "phan_hoi_admin" => "Dạ hệ thống đã update lại số chỗ, anh vui lòng thử lại ạ.", "created_at" => $now->copy()->subDays(2), "updated_at" => $now->copy()->subDays(1)],
            ["id" => 2, "ma_khach_hang" => "KH005", "tieu_de" => "Khóa tài khoản", "loai" => "KhieuNai", "mo_ta" => "Tại sao tài khoản tôi bị khóa?", "trang_thai" => "ChoXuLy", "ma_admin_xu_ly" => null, "phan_hoi_admin" => null, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}