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
        Schema::create('yeu_cau_ais', function (Blueprint $table) {
            $table->string('ma_yeu_cau')->primary();
            $table->string('ma_khach_hang');
            $table->string('ma_ke_hoach');
            $table->text('yeu_cau')->nullable();
            $table->json('ket_qua')->nullable();
            $table->dateTime('ngay_tao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_cau_ais');
    }
};