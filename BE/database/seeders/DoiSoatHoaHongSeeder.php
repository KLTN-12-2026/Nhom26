<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DoiSoatHoaHongSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("doi_soat_hoa_hongs")->insert([
            ["ma_doi_soat" => 1, "ma_hoa_don" => "HD001", "ma_doi_tac" => "DT01", "tong_tien_giao_dich" => 7000000, "phan_tram_hoa_hong" => 10, "tien_hoa_hong_admin" => 700000, "tien_doi_tac_thuc_nhan" => 6300000, "trang_thai_thanh_toan" => 1, "ngay_doi_soat" => $now->copy()->subDays(1), "created_at" => $now, "updated_at" => $now],
            ["ma_doi_soat" => 2, "ma_hoa_don" => "HD002", "ma_doi_tac" => "DT01", "tong_tien_giao_dich" => 4800000, "phan_tram_hoa_hong" => 10, "tien_hoa_hong_admin" => 480000, "tien_doi_tac_thuc_nhan" => 4320000, "trang_thai_thanh_toan" => 0, "ngay_doi_soat" => $now, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}