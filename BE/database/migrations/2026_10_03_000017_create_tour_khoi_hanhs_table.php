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
        Schema::create('tour_khoi_hanhs', function (Blueprint $table) {
            $table->string('ma_thoi_gian_tour')->primary();
            $table->string('ma_tour');
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->decimal('gia_tour', 15, 2)->nullable();
            $table->integer('so_cho')->nullable();
            $table->integer('tinh_trang')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_khoi_hanhs');
    }
};