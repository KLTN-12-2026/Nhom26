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
        Schema::create('tuyen_diem_tour', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_tour');
            $table->unsignedBigInteger('ma_dia_diem');
            $table->integer('thu_tu')->comment('CHECK thu_tu > 0');

            $table->unique(['ma_tour', 'thu_tu']);
            $table->unique(['ma_tour', 'ma_dia_diem']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuyen_diem_tour');
    }
};
