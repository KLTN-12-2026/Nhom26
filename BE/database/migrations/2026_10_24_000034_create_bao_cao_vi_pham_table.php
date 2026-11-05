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
        Schema::create('bao_cao_vi_pham', function (Blueprint $table) {
            $table->bigIncrements('ma_bao_cao');
            $table->unsignedBigInteger('nguoi_bao_cao_id');
            $table->unsignedBigInteger('ma_dia_diem')->nullable();
            $table->unsignedBigInteger('ma_tour')->nullable();
            $table->unsignedBigInteger('ma_danh_gia')->nullable();
            $table->string('loai_ly_do', 50)->comment('sai_thong_tin, spam, lua_dao, khong_phu_hop');
            $table->text('mo_ta')->nullable();
            $table->string('trang_thai_xu_ly', 20)->default('cho_xu_ly')->comment('cho_xu_ly, da_xu_ly, bac_bo');
            $table->unsignedBigInteger('nguoi_xu_ly_id')->nullable();
            $table->text('ket_qua_xu_ly')->nullable();
            $table->timestamp('ngay_xu_ly')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bao_cao_vi_pham');
    }
};
