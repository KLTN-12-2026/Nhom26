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
        Schema::create('chuc_vu', function (Blueprint $table) {
            $table->increments('ma_chuc_vu');
            $table->string('ten_chuc_vu', 50)->unique()->comment('quan_tri_vien, doi_tac, du_khach');
            $table->string('mo_ta', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuc_vu');
    }
};
