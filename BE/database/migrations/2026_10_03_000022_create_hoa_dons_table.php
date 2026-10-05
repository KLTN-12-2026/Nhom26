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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->string('ma_hoa_don')->primary();
            $table->string('ma_nhom')->nullable();
            $table->string('ma_khach_hang_dat');
            $table->string('ma_voucher')->nullable();
            $table->integer('loai_hoa_don')->nullable();
            $table->decimal('tong_tien', 15, 2)->nullable();
            $table->decimal('so_tien_giam', 15, 2)->nullable();
            $table->decimal('so_tien_thanh_toan', 15, 2)->nullable();
            $table->integer('trang_thai_don_hang')->default(1);
            $table->integer('trang_thai_thanh_toan')->default(0);
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
        Schema::dropIfExists('hoa_dons');
    }
};