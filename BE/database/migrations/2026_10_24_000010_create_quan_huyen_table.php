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
        Schema::create('quan_huyen', function (Blueprint $table) {
            $table->string('ma_huyen', 10)->primary()->comment('Ma cap huyen cu theo danh muc truoc 2025; luu chuoi de giu so 0 dau');
            $table->string('ma_tinh', 10)->index()->comment('Ma tinh tai THOI DIEM quan/huyen con ton tai; co the la tinh lich su');
            $table->string('ten_huyen', 150);
            $table->string('loai_don_vi', 30)->comment('quan, huyen, thi_xa, thanh_pho_thuoc_tinh, thanh_pho_thuoc_thanh_pho');
            $table->date('ngay_ngung_hoat_dong')->nullable()->comment('Ngay ket thuc tu cach don vi hanh chinh; nhap tu nguon chinh thuc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quan_huyen');
    }
};
