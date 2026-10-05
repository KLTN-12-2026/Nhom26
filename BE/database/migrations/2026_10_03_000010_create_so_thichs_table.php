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
        Schema::create('so_thichs', function (Blueprint $table) {
            $table->string('ma_so_thich')->primary();
            $table->string('ma_khach_hang');
            $table->string('ma_tag');
            $table->string('muc_do')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_thichs');
    }
};