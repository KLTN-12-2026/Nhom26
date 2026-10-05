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
        Schema::create('dia_diems', function (Blueprint $table) {
            $table->string('ma_dia_diem')->primary();
            $table->string('ma_doi_tac_tao');
            $table->string('ten_dia_diem');
            $table->string('loai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->decimal('kinh_do', 10, 7)->nullable();
            $table->decimal('vi_do', 10, 7)->nullable();
            $table->time('gio_mo_cua')->nullable();
            $table->time('gio_dong_cua')->nullable();
            $table->decimal('gia_giao_dong', 15, 2)->nullable();
            $table->string('hinh_anh_dai_dien')->nullable();
            $table->text('mo_ta')->nullable();
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
        Schema::dropIfExists('dia_diems');
    }
};