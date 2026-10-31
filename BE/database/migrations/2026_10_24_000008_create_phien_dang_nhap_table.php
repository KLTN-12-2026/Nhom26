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
        Schema::create('phien_dang_nhap', function (Blueprint $table) {
            $table->bigIncrements('ma_phien');
            $table->unsignedBigInteger('ma_nguoi_dung')->index();
            $table->string('refresh_token_hash', 255)->unique();
            $table->string('thiet_bi', 255)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('het_han_luc');
            $table->timestamp('ngay_thu_hoi')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phien_dang_nhap');
    }
};
