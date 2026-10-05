<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class KhachHangSeeder extends Seeder {
    public function run(): void {
        $now = Carbon::now();
        DB::table("khach_hangs")->insert([
            ["ma_khach_hang" => "KH001", "ho_va_ten" => "Nguyễn Tuấn Anh", "email" => "tuananh@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1995-05-15", "gioi_tinh" => 1, "so_dien_thoai" => "0912345671", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH002", "ho_va_ten" => "Lê Hải Yến", "email" => "haiyen@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1998-08-20", "gioi_tinh" => 0, "so_dien_thoai" => "0912345672", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH003", "ho_va_ten" => "Trần Minh Tuấn", "email" => "minhtuan@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1990-12-10", "gioi_tinh" => 1, "so_dien_thoai" => "0912345673", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH004", "ho_va_ten" => "Phạm Quỳnh Như", "email" => "quynhnhu@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "2000-01-25", "gioi_tinh" => 0, "so_dien_thoai" => "0912345674", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH005", "ho_va_ten" => "Hoàng Bảo Long", "email" => "baolong@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1992-03-30", "gioi_tinh" => 1, "so_dien_thoai" => "0912345675", "is_block" => 1, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH006", "ho_va_ten" => "Đặng Thị Mai", "email" => "thimai@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1997-11-05", "gioi_tinh" => 0, "so_dien_thoai" => "0912345676", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH007", "ho_va_ten" => "Bùi Xuân Huấn", "email" => "xuanhuan@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1985-07-12", "gioi_tinh" => 1, "so_dien_thoai" => "0912345677", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH008", "ho_va_ten" => "Ngô Thanh Vân", "email" => "thanhvan@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1980-02-28", "gioi_tinh" => 0, "so_dien_thoai" => "0912345678", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH009", "ho_va_ten" => "Đỗ Trung Quân", "email" => "trungquan@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1993-09-18", "gioi_tinh" => 1, "so_dien_thoai" => "0912345679", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
            ["ma_khach_hang" => "KH010", "ho_va_ten" => "Vũ Hà Phương", "email" => "haphuong@gmail.com", "mat_khau" => Hash::make("123456"), "ngay_sinh" => "1999-04-04", "gioi_tinh" => 0, "so_dien_thoai" => "0912345680", "is_block" => 0, "hash_reset" => null, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}