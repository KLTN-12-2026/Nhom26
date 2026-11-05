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
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->bigIncrements('ma_thong_bao');
            $table->unsignedBigInteger('ma_nguoi_nhan');
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->string('loai_thong_bao', 50)->nullable()->comment('he_thong, dat_tour, kiem_duyet, nhac_nho');
            $table->string('duong_dan_lien_ket', 255)->nullable()->comment('Đường dẫn để chuyển hướng khi click vào thông báo (ví dụ: /tour/123)');
            $table->boolean('da_doc')->default(false);
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_bao');
    }
};
