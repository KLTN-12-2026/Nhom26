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
        Schema::create('dia_diem_the', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_dia_diem');
            $table->unsignedInteger('ma_the');

            $table->primary(['ma_dia_diem', 'ma_the']);
            $table->index('ma_the');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem_the');
    }
};
