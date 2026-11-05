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
        Schema::create('khach_tham_gia_tour', function (Blueprint $table) {
            $table->bigIncrements('ma_khach');
            $table->unsignedBigInteger('ma_dat_tour')->index();
            $table->string('ho_ten', 255);
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('loai_khach', 20)->default('nguoi_lon')->comment('nguoi_lon, tre_em, em_be');
            $table->text('ghi_chu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_tham_gia_tour');
    }
};
