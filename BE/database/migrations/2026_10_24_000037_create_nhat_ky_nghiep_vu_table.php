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
        Schema::create('nhat_ky_nghiep_vu', function (Blueprint $table) {
            $table->bigIncrements('ma_nhat_ky');
            $table->unsignedBigInteger('ma_nguoi_thuc_hien')->nullable()->comment('Co the NULL khi he thong tu dong chuyen trang thai');
            $table->unsignedBigInteger('ma_doi_tac')->nullable();
            $table->unsignedBigInteger('ma_dia_diem')->nullable();
            $table->unsignedBigInteger('ma_tour')->nullable();
            $table->unsignedBigInteger('ma_danh_gia')->nullable();
            $table->unsignedBigInteger('ma_dat_tour')->nullable();
            $table->string('trang_thai_cu', 30)->nullable();
            $table->string('trang_thai_moi', 30)->nullable();
            $table->string('hanh_dong', 30)->comment('phe_duyet, tu_choi, an, bo_an, tao_don, doi_trang_thai');
            $table->text('ly_do')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhat_ky_nghiep_vu');
    }
};
