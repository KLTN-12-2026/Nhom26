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
        Schema::create('chi_tiet_tours', function (Blueprint $table) {
            $table->string('ma_chi_tiet_tour')->primary();
            $table->string('ma_tour');
            $table->string('ma_dia_diem')->nullable();
            $table->integer('ngay_hanh_trinh')->nullable();
            $table->integer('thu_tu_hanh_trinh')->nullable();
            $table->text('ghi_chu_hanh_trinh')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_tours');
    }
};