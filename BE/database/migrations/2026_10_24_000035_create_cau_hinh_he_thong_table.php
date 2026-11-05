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
        Schema::create('cau_hinh_he_thong', function (Blueprint $table) {
            $table->string('khoa_cau_hinh', 100)->primary()->comment('VD: TRONG_SO_SO_THICH, TOC_DO_XE_MAY, GIO_AN_TRUA');
            $table->text('gia_tri');
            $table->string('mo_ta', 255)->nullable();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cau_hinh_he_thong');
    }
};
