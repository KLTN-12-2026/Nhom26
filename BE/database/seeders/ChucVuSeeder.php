<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder {
    public function run(): void {
        DB::table("chuc_vus")->insert([
            ["ma_chuc_vu" => "CV01", "ten_chuc_vu" => "Quản trị viên cấp cao", "mo_ta" => "Toàn quyền hệ thống"],
            ["ma_chuc_vu" => "CV02", "ten_chuc_vu" => "Quản lý đối tác", "mo_ta" => "Quản lý và duyệt đối tác/tour"],
            ["ma_chuc_vu" => "CV03", "ten_chuc_vu" => "Chăm sóc khách hàng", "mo_ta" => "Hỗ trợ khách hàng, giải quyết khiếu nại"],
            ["ma_chuc_vu" => "CV04", "ten_chuc_vu" => "Kế toán", "mo_ta" => "Đối soát và quản lý tài chính"],
        ]);
    }
}