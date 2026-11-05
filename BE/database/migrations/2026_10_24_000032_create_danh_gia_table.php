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
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->bigIncrements('ma_danh_gia');
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedBigInteger('ma_dia_diem')->nullable()->comment('Chỉ điền khi đánh giá địa điểm');
            $table->unsignedBigInteger('ma_tour')->nullable()->comment('Chỉ điền khi đánh giá tour');
            $table->unsignedBigInteger('ma_dat_tour')->nullable()->unique()->comment('Bat buoc neu danh gia tour; xac minh don hoan thanh');
            $table->integer('so_sao')->comment('CHECK so_sao BETWEEN 1 AND 5');
            $table->text('noi_dung')->nullable();
            $table->string('trang_thai', 20)->default('hien_thi')->comment('hien_thi, bi_an');
            $table->unsignedBigInteger('nguoi_kiem_duyet_id')->nullable();
            $table->timestamp('ngay_kiem_duyet')->nullable();
            $table->text('ly_do_an')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};
