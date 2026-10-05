<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder {
    public function run(): void {
        DB::table("tags")->insert([
            ["ma_tag" => "TAG01", "ten_tag" => "Biển đảo", "mo_ta" => "Du lịch ngắm biển, tắm biển, đảo"],
            ["ma_tag" => "TAG02", "ten_tag" => "Núi rừng", "mo_ta" => "Khám phá vùng cao, trekking, leo núi"],
            ["ma_tag" => "TAG03", "ten_tag" => "Nghỉ dưỡng", "mo_ta" => "Các tour thư giãn, resort 5 sao"],
            ["ma_tag" => "TAG04", "ten_tag" => "Văn hóa", "mo_ta" => "Tham quan di tích lịch sử, phố cổ"],
            ["ma_tag" => "TAG05", "ten_tag" => "Ẩm thực", "mo_ta" => "Thưởng thức đặc sản vùng miền"],
        ]);
    }
}