<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NhomSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("nhoms")->insert([
            ["ma_nhom" => "NH001", "ten_nhom" => "Hội bạn thân cấp 3", "ma_truong_nhom" => "KH001", "created_at" => $now, "updated_at" => $now],
            ["ma_nhom" => "NH002", "ten_nhom" => "Gia đình Tuấn Anh", "ma_truong_nhom" => "KH002", "created_at" => $now, "updated_at" => $now],
            ["ma_nhom" => "NH003", "ten_nhom" => "Phượt thủ miền Bắc", "ma_truong_nhom" => "KH003", "created_at" => $now, "updated_at" => $now],
        ]);
    }
}