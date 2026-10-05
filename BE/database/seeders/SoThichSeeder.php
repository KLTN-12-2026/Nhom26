<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoThichSeeder extends Seeder {
    public function run(): void {
        DB::table("so_thichs")->insert([
            ["ma_so_thich" => "ST001", "ma_khach_hang" => "KH001", "ma_tag" => "TAG01", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST002", "ma_khach_hang" => "KH001", "ma_tag" => "TAG03", "muc_do" => "Trung bình"],
            ["ma_so_thich" => "ST003", "ma_khach_hang" => "KH002", "ma_tag" => "TAG02", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST004", "ma_khach_hang" => "KH003", "ma_tag" => "TAG04", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST005", "ma_khach_hang" => "KH004", "ma_tag" => "TAG01", "muc_do" => "Thấp"],
            ["ma_so_thich" => "ST006", "ma_khach_hang" => "KH005", "ma_tag" => "TAG05", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST007", "ma_khach_hang" => "KH006", "ma_tag" => "TAG02", "muc_do" => "Trung bình"],
            ["ma_so_thich" => "ST008", "ma_khach_hang" => "KH007", "ma_tag" => "TAG03", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST009", "ma_khach_hang" => "KH008", "ma_tag" => "TAG04", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST010", "ma_khach_hang" => "KH009", "ma_tag" => "TAG05", "muc_do" => "Cao"],
            ["ma_so_thich" => "ST011", "ma_khach_hang" => "KH010", "ma_tag" => "TAG01", "muc_do" => "Cao"],
        ]);
    }
}