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
        Schema::create('lich_khoi_hanh', function (Blueprint $table) {
            $table->bigIncrements('ma_lich_khoi_hanh');
            $table->unsignedBigInteger('ma_tour');
            $table->date('ngay_khoi_hanh');
            $table->date('ngay_ket_thuc_du_kien')->nullable()->comment('Khong som hon ngay khoi hanh; co the suy ra tu tour.so_ngay');
            $table->time('gio_khoi_hanh');
            $table->integer('tong_so_cho')->comment('CHECK > 0');
            $table->integer('so_cho_con_lai')->comment('Bo dem ton cho, cap nhat dong bo bang transaction/row lock, 0 <= con_lai <= tong_so_cho');
            $table->string('trang_thai', 20)->default('mo_ban')->comment('mo_ban, da_dong, da_huy');

            $table->unique(['ma_tour', 'ngay_khoi_hanh', 'gio_khoi_hanh'], 'uq_lkh_tour_ngay_gio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_khoi_hanh');
    }
};
