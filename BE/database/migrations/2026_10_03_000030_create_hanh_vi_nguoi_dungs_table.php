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
        Schema::create('hanh_vi_nguoi_dungs', function (Blueprint $table) {
            $table->string('ma_hanh_vi')->primary();
            $table->string('ma_khach_hang');
            $table->string('ma_dia_diem')->nullable();
            $table->string('ma_ke_hoach')->nullable();
            $table->string('ma_ly_do')->nullable();
            $table->string('loai_hanh_vi')->nullable();
            $table->decimal('gia_tri', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hanh_vi_nguoi_dungs');
    }
};