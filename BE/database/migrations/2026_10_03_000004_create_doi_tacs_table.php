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
        Schema::create('doi_tacs', function (Blueprint $table) {
            $table->string('ma_doi_tac')->primary();
            $table->string('ten_doi_tac');
            $table->string('ten_nguoi_dai_dien')->nullable();
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->boolean('is_block')->default(0);
            $table->string('trang_thai_duyet')->nullable();
            $table->text('ly_do_tu_choi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doi_tacs');
    }
};