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
        Schema::create('ly_do_hanh_vis', function (Blueprint $table) {
            $table->string('ma_ly_do')->primary();
            $table->string('ma_ly_do_code')->unique();
            $table->string('ten_ly_do');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ly_do_hanh_vis');
    }
};