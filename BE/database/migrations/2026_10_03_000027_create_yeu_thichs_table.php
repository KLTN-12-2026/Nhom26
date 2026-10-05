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
        Schema::create('yeu_thichs', function (Blueprint $table) {
            $table->string('ma_yeu_thich')->primary();
            $table->string('ma_khach_hang');
            $table->string('ma_dia_diem')->nullable();
            $table->string('ma_tour')->nullable();
            $table->dateTime('ngay_tao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_thichs');
    }
};