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
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->bigIncrements('ma_nguoi_dung');
            $table->string('ho_ten', 255);
            $table->string('email', 255)->unique();
            $table->string('mat_khau', 255);
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('anh_dai_dien', 255)->nullable();
            $table->string('trang_thai', 20)->default('hoat_dong')->comment('hoat_dong, bi_khoa, cho_kich_hoat');
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
            $table->softDeletes('ngay_xoa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dung');
    }
};
