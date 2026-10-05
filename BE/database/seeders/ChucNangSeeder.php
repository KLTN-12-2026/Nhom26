<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder {
    public function run(): void {
        DB::table("chuc_nangs")->insert([
            ["ma_chuc_nang" => "CN01", "ten_chuc_nang" => "Quản lý Khách hàng", "mo_ta" => "Xem danh sách và chặn khách hàng"],
            ["ma_chuc_nang" => "CN02", "ten_chuc_nang" => "Quản lý Đối tác", "mo_ta" => "Duyệt đăng ký đối tác mới"],
            ["ma_chuc_nang" => "CN03", "ten_chuc_nang" => "Quản lý Tour & Dịch vụ", "mo_ta" => "Kiểm duyệt nội dung tour"],
            ["ma_chuc_nang" => "CN04", "ten_chuc_nang" => "Thống kê & Đối soát", "mo_ta" => "Xem biểu đồ, quản lý hóa đơn"],
        ]);
    }
}