<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HanhViNguoiDungSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("hanh_vi_nguoi_dungs")->insert([
            ["ma_hanh_vi" => "HV001", "ma_khach_hang" => "KH001", "ma_dia_diem" => "DD001", "ma_ke_hoach" => null, "ma_ly_do" => null, "loai_hanh_vi" => "View", "gia_tri" => 0, "created_at" => $now],
            ["ma_hanh_vi" => "HV002", "ma_khach_hang" => "KH003", "ma_dia_diem" => null, "ma_ke_hoach" => "KHP001", "ma_ly_do" => "LD01", "loai_hanh_vi" => "Cancel Booking", "gia_tri" => 0, "created_at" => $now],
        ]);
    }
}