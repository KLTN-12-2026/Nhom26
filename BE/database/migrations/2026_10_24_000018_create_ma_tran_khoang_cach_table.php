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
        Schema::create('ma_tran_khoang_cach', function (Blueprint $table) {
            $table->bigIncrements('ma_khoang_cach');
            $table->unsignedBigInteger('dia_diem_xuat_phat_id');
            $table->unsignedBigInteger('dia_diem_dich_den_id');
            $table->integer('khoang_cach_met')->comment('Khoảng cách đường đi thực tế (mét)');
            $table->integer('thoi_gian_giay')->comment('Thời gian di chuyển ước tính (giây)');
            $table->string('loai_phuong_tien', 20)->default('xe_may')->comment('di_bo, xe_may, o_to');
            $table->string('nguon_du_lieu', 50)->nullable()->comment('OSRM, Valhalla hoặc dịch vụ khác');
            $table->timestamp('ngay_cap_nhat')->nullable();

            $table->unique(['dia_diem_xuat_phat_id', 'dia_diem_dich_den_id', 'loai_phuong_tien'], 'uq_mtkc_xuat_dich_pt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_tran_khoang_cach');
    }
};
