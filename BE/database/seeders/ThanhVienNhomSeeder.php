<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThanhVienNhomSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("thanh_vien_nhoms")->insert([
            ["ma_thanh_vien" => "TVN001", "ma_nhom" => "NH001", "ma_khach_hang" => "KH001", "vai_tro" => 1, "ngay_tham_gia" => $now],
            ["ma_thanh_vien" => "TVN002", "ma_nhom" => "NH001", "ma_khach_hang" => "KH004", "vai_tro" => 0, "ngay_tham_gia" => $now],
            ["ma_thanh_vien" => "TVN003", "ma_nhom" => "NH001", "ma_khach_hang" => "KH005", "vai_tro" => 0, "ngay_tham_gia" => $now],
            
            ["ma_thanh_vien" => "TVN004", "ma_nhom" => "NH002", "ma_khach_hang" => "KH002", "vai_tro" => 1, "ngay_tham_gia" => $now],
            ["ma_thanh_vien" => "TVN005", "ma_nhom" => "NH002", "ma_khach_hang" => "KH006", "vai_tro" => 0, "ngay_tham_gia" => $now],
            
            ["ma_thanh_vien" => "TVN006", "ma_nhom" => "NH003", "ma_khach_hang" => "KH003", "vai_tro" => 1, "ngay_tham_gia" => $now],
            ["ma_thanh_vien" => "TVN007", "ma_nhom" => "NH003", "ma_khach_hang" => "KH007", "vai_tro" => 0, "ngay_tham_gia" => $now],
        ]);
    }
}