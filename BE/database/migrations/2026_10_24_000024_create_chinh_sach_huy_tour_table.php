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
        Schema::create('chinh_sach_huy_tour', function (Blueprint $table) {
            $table->bigIncrements('ma_chinh_sach');
            $table->unsignedBigInteger('ma_tour');
            $table->integer('phien_ban')->default(1);
            $table->integer('so_gio_truoc_khoi_hanh');
            $table->decimal('ti_le_hoan_tien', 5, 2);
            $table->timestamp('ngay_tao')->useCurrent();

            $table->unique(['ma_tour', 'phien_ban', 'so_gio_truoc_khoi_hanh'], 'uq_csht_tour_pb_gio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chinh_sach_huy_tour');
    }
};
