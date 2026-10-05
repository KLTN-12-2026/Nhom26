<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KeHoachSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("ke_hoachs")->insert([
            ["ma_ke_hoach" => "KHP001", "ma_khach_hang_tao" => "KH001", "ma_nhom" => "NH001", "ten_ke_hoach" => "Chuyến đi Vịnh Hạ Long", "mo_ta" => "3 ngày 2 đêm thư giãn", "so_nguoi" => 3, "ngay_bat_dau" => $now->copy()->addDays(5)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(7)->format('Y-m-d'), "ngan_sach_du_kien" => 15000000, "tong_chi_phi" => 14000000, "trang_thai" => 1, "nguon_tao" => "AI", "du_lieu_ai" => json_encode(["status" => "done"]), "created_at" => $now, "updated_at" => $now],
            ["ma_ke_hoach" => "KHP002", "ma_khach_hang_tao" => "KH002", "ma_nhom" => "NH002", "ten_ke_hoach" => "Du lịch Phú Quốc gia đình", "mo_ta" => "Khám phá đảo ngọc", "so_nguoi" => 2, "ngay_bat_dau" => $now->copy()->addDays(10)->format('Y-m-d'), "ngay_ket_thuc" => $now->copy()->addDays(12)->format('Y-m-d'), "ngan_sach_du_kien" => 20000000, "tong_chi_phi" => 18000000, "trang_thai" => 1, "nguon_tao" => "ThuCong", "du_lieu_ai" => null, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}