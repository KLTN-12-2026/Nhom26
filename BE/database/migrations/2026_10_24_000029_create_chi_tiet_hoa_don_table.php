<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->bigIncrements('ma_chi_tiet');
            $table->unsignedBigInteger('ma_hoa_don');
            $table->string('ten_khoan_muc', 255)->comment('VD: Vé tour người lớn, Phụ thu phòng đơn, Giảm giá voucher...');
            $table->string('loai_khoan_muc', 20)->comment('gia_goc, phu_phi, giam_gia');
            $table->string('loai_khach', 20)->nullable()->comment('nguoi_lon, tre_em, em_be. Bat buoc neu gia_goc');
            $table->integer('so_luong')->default(1);
            $table->decimal('don_gia', 12, 2);
            $table->decimal('thanh_tien', 12, 2)->comment('Bằng so_luong * don_gia. Có thể mang giá trị âm nếu là khoản giảm trừ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
};
