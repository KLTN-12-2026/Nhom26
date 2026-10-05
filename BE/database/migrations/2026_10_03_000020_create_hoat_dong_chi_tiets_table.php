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
        Schema::create('hoat_dong_chi_tiets', function (Blueprint $table) {
            $table->string('ma_hoat_dong_chi_tiet')->primary();
            $table->string('ma_ke_hoach');
            $table->string('ma_dia_diem')->nullable();
            $table->string('ma_thoi_gian_tour')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->time('gio_bat_dau')->nullable();
            $table->time('gio_ket_thuc')->nullable();
            $table->date('ngay_cu_the')->nullable();
            $table->decimal('chi_phi_du_kien', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoat_dong_chi_tiets');
    }
};