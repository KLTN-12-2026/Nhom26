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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->string('ma_thanh_toan')->primary();
            $table->string('ma_hoa_don');
            $table->string('phuong_thuc')->nullable();
            $table->decimal('so_tien', 15, 2)->nullable();
            $table->string('ma_giao_dich')->unique()->nullable();
            $table->string('trang_thai')->nullable();
            $table->dateTime('thoi_gian_thanh_toan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};