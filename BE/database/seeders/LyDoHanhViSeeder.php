<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LyDoHanhViSeeder extends Seeder {
    public function run(): void {
        DB::table("ly_do_hanh_vis")->insert([
            ["ma_ly_do" => "LD01", "ma_ly_do_code" => "PRICE_HIGH", "ten_ly_do" => "Giá quá cao", "mo_ta" => "Khách hàng cảm thấy giá không hợp lý"],
            ["ma_ly_do" => "LD02", "ma_ly_do_code" => "DATE_NOT_MATCH", "ten_ly_do" => "Lịch không phù hợp", "mo_ta" => "Không rảnh vào ngày khởi hành"],
            ["ma_ly_do" => "LD03", "ma_ly_do_code" => "FOUND_BETTER", "ten_ly_do" => "Tìm được deal tốt hơn", "mo_ta" => "Khách tìm được ưu đãi bên khác"],
        ]);
    }
}