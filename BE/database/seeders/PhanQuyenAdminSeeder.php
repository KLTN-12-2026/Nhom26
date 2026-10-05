<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenAdminSeeder extends Seeder {
    public function run(): void {
        DB::table("phan_quyen_admins")->insert([
            // Quản lý đối tác (CV02)
            ["ma_phan_quyen" => "PQ01", "ma_chuc_nang" => "CN02", "ma_chuc_vu" => "CV02", "quyen_xem" => 1, "quyen_them" => 1, "quyen_sua" => 1, "quyen_xoa" => 0],
            ["ma_phan_quyen" => "PQ02", "ma_chuc_nang" => "CN03", "ma_chuc_vu" => "CV02", "quyen_xem" => 1, "quyen_them" => 1, "quyen_sua" => 1, "quyen_xoa" => 0],
            
            // CSKH (CV03)
            ["ma_phan_quyen" => "PQ03", "ma_chuc_nang" => "CN01", "ma_chuc_vu" => "CV03", "quyen_xem" => 1, "quyen_them" => 0, "quyen_sua" => 1, "quyen_xoa" => 0],
            
            // Kế toán (CV04)
            ["ma_phan_quyen" => "PQ04", "ma_chuc_nang" => "CN04", "ma_chuc_vu" => "CV04", "quyen_xem" => 1, "quyen_them" => 1, "quyen_sua" => 1, "quyen_xoa" => 0],
        ]);
    }
}