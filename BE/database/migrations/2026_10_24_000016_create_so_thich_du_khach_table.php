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
        Schema::create('so_thich_du_khach', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedInteger('ma_the');
            $table->integer('muc_do_uu_tien')->default(3)->comment('Mức ưu tiên từ 1 đến 5');

            $table->primary(['ma_nguoi_dung', 'ma_the']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_thich_du_khach');
    }
};
