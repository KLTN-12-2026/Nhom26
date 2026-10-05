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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->string('ma_khach_hang')->primary();
            $table->string('ho_va_ten')->nullable();
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->date('ngay_sinh')->nullable();
            $table->boolean('gioi_tinh')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->boolean('is_block')->default(0);
            $table->string('hash_reset')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};