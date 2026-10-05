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
        Schema::create('thanh_vien_nhoms', function (Blueprint $table) {
            $table->string('ma_thanh_vien')->primary();
            $table->string('ma_nhom');
            $table->string('ma_khach_hang');
            $table->integer('vai_tro')->default(0);
            $table->dateTime('ngay_tham_gia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_vien_nhoms');
    }
};