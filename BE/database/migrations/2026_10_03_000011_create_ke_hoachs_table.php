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
        Schema::create('ke_hoachs', function (Blueprint $table) {
            $table->string('ma_ke_hoach')->primary();
            $table->string('ma_khach_hang_tao');
            $table->string('ma_nhom')->nullable();
            $table->string('ten_ke_hoach');
            $table->text('mo_ta')->nullable();
            $table->integer('so_nguoi')->default(1);
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->decimal('ngan_sach_du_kien', 15, 2)->nullable();
            $table->decimal('tong_chi_phi', 15, 2)->nullable();
            $table->boolean('trang_thai')->default(1);
            $table->string('nguon_tao')->nullable();
            $table->json('du_lieu_ai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ke_hoachs');
    }
};