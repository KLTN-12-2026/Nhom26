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
        Schema::create('dia_diem_yeu_thich', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedBigInteger('ma_dia_diem');
            $table->timestamp('ngay_luu')->nullable();

            $table->primary(['ma_nguoi_dung', 'ma_dia_diem']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem_yeu_thich');
    }
};
