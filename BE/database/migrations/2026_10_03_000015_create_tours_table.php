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
        Schema::create('tours', function (Blueprint $table) {
            $table->string('ma_tour')->primary();
            $table->string('ma_doi_tac');
            $table->string('ten_tour');
            $table->text('mo_ta')->nullable();
            $table->string('hinh_anh_dai_dien')->nullable();
            $table->integer('so_ngay')->nullable();
            $table->integer('so_nguoi_toi_da')->nullable();
            $table->string('trang_thai_duyet')->nullable();
            $table->boolean('trang_thai_hien_thi')->default(1);
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
        Schema::dropIfExists('tours');
    }
};