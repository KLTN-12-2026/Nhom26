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
        Schema::create('danh_gia_tours', function (Blueprint $table) {
            $table->id();
            $table->string('ma_tour');
            $table->string('ma_khach_hang');
            $table->integer('so_sao')->nullable();
            $table->text('binh_luan')->nullable();
            $table->dateTime('ngay_danh_gia')->nullable();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia_tours');
    }
};