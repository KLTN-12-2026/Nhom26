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
        Schema::create('hinh_anh', function (Blueprint $table) {
            $table->bigIncrements('ma_hinh_anh');
            $table->unsignedBigInteger('ma_dia_diem')->nullable()->index()->comment('Chỉ điền nếu là ảnh địa điểm');
            $table->unsignedBigInteger('ma_tour')->nullable()->index()->comment('XOR: chi mot trong ma_dia_diem,ma_tour,ma_danh_gia');
            $table->unsignedBigInteger('ma_danh_gia')->nullable()->index()->comment('Anh dinh kem danh gia; khong dat la_anh_chinh');
            $table->integer('thu_tu')->default(1)->comment('Thu tu anh theo doi tuong');
            $table->string('duong_dan_anh', 255);
            $table->boolean('la_anh_chinh')->default(false)->comment('Toi da mot anh chinh moi tour/dia diem; unique partial index/trigger/backend');

            $table->unique(['ma_danh_gia', 'thu_tu']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh');
    }
};
