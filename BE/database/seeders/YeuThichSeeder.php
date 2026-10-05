<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YeuThichSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("yeu_thichs")->insert([
            ["ma_yeu_thich" => "YT001", "ma_khach_hang" => "KH001", "ma_dia_diem" => "DD001", "ma_tour" => null, "ngay_tao" => $now->copy()->subDays(5)],
            ["ma_yeu_thich" => "YT002", "ma_khach_hang" => "KH001", "ma_dia_diem" => null, "ma_tour" => "TOUR02", "ngay_tao" => $now->copy()->subDays(4)],
            ["ma_yeu_thich" => "YT003", "ma_khach_hang" => "KH002", "ma_dia_diem" => "DD002", "ma_tour" => null, "ngay_tao" => $now->copy()->subDays(3)],
        ]);
    }
}