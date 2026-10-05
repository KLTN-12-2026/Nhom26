<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("admins")->insert([
            ["ma_admin" => "AD01", "ho_va_ten" => "Admin Tổng", "email" => "admin@smarttravel.com", "mat_khau" => Hash::make("123456"), "ma_chuc_vu" => "CV01", "is_block" => 0, "created_at" => $now, "updated_at" => $now],
            ["ma_admin" => "AD02", "ho_va_ten" => "Quản lý Đối Tác", "email" => "doitac@smarttravel.com", "mat_khau" => Hash::make("123456"), "ma_chuc_vu" => "CV02", "is_block" => 0, "created_at" => $now, "updated_at" => $now],
            ["ma_admin" => "AD03", "ho_va_ten" => "CSKH 1", "email" => "cskh@smarttravel.com", "mat_khau" => Hash::make("123456"), "ma_chuc_vu" => "CV03", "is_block" => 0, "created_at" => $now, "updated_at" => $now],
            ["ma_admin" => "AD04", "ho_va_ten" => "Kế toán 1", "email" => "ketoan@smarttravel.com", "mat_khau" => Hash::make("123456"), "ma_chuc_vu" => "CV04", "is_block" => 0, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}