<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YeuCauAiSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("yeu_cau_ais")->insert([
            ["ma_yeu_cau" => "YCAI001", "ma_khach_hang" => "KH001", "ma_ke_hoach" => "KHP001", "yeu_cau" => "Tạo lịch trình Hạ Long cho 3 người, ngân sách 15tr, thích Biển", "ket_qua" => json_encode(["days" => 3, "locations" => ["DD001"]]), "ngay_tao" => $now],
        ]);
    }
}