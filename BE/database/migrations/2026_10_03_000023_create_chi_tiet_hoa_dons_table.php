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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->string('ma_chi_tiet')->primary();
            $table->string('ma_hoa_don');
            $table->string('ma_thoi_gian_tour')->nullable();
            $table->string('ma_dich_vu')->nullable();
            $table->integer('so_luong')->default(1);
            $table->decimal('don_gia', 15, 2)->nullable();
            $table->decimal('thanh_tien', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};