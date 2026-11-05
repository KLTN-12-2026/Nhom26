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
        Schema::create('chuc_vu_chuc_nang', function (Blueprint $table) {
            $table->unsignedInteger('ma_chuc_vu');
            $table->unsignedInteger('ma_chuc_nang');

            $table->primary(['ma_chuc_vu', 'ma_chuc_nang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuc_vu_chuc_nang');
    }
};
