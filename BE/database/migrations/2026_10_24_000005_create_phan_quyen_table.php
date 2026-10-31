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
        Schema::create('phan_quyen', function (Blueprint $table) {
            $table->bigIncrements('ma_phan_quyen');
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedInteger('ma_chuc_vu');
            $table->unsignedInteger('ma_chuc_nang');

            $table->unique(['ma_nguoi_dung', 'ma_chuc_vu', 'ma_chuc_nang'], 'uq_pq_nd_cv_cn');
            $table->index(['ma_chuc_vu', 'ma_chuc_nang'], 'idx_pq_cv_cn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_quyen');
    }
};
