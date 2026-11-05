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
        Schema::create('xac_thuc_nguoi_dung', function (Blueprint $table) {
            $table->bigIncrements('ma_xac_thuc');
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->string('loai_ma', 30)->comment('kich_hoat_email, dat_lai_mat_khau, otp_dang_nhap');
            $table->string('ma_hash', 255)->comment('Hash cua OTP/token, KHONG luu gia tri thuan');
            $table->timestamp('het_han_luc');
            $table->boolean('da_su_dung')->default(false);
            $table->integer('so_lan_thu')->default(0);
            $table->timestamp('ngay_tao')->useCurrent();

            $table->index(['ma_nguoi_dung', 'loai_ma', 'het_han_luc'], 'idx_xtnd_nd_loai_hh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xac_thuc_nguoi_dung');
    }
};
