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
        Schema::create('tinh_thanh', function (Blueprint $table) {
            $table->string('ma_tinh', 10)->primary()->comment('Ma danh muc hanh chinh chinh thuc, giu dang chuoi');
            $table->string('ten_tinh', 150);
            $table->string('loai_don_vi', 30)->comment('tinh, thanh_pho');
            $table->boolean('dang_hoat_dong')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinh_thanh');
    }
};
