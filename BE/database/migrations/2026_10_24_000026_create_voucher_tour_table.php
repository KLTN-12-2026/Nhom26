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
        Schema::create('voucher_tour', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_voucher');
            $table->unsignedBigInteger('ma_tour');

            $table->primary(['ma_voucher', 'ma_tour']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_tour');
    }
};
