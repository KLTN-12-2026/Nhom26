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
        Schema::create('chi_tiet_lich_trinh', function (Blueprint $table) {
            $table->bigIncrements('ma_chi_tiet');
            $table->unsignedBigInteger('ma_lich_trinh');
            $table->unsignedBigInteger('ma_dia_diem');
            $table->integer('ngay_thu_may')->default(1)->comment('CHECK ngay_thu_may >= 1');
            $table->integer('thu_tu')->comment('CHECK thu_tu > 0; thu tu duy nhat trong ngay');
            $table->time('gio_den_du_kien');
            $table->time('gio_roi_du_kien')->comment('CHECK gio_roi_du_kien > gio_den_du_kien trong cung ngay');
            $table->integer('thoi_gian_di_chuyen')->default(0)->comment('Thời gian đi đến điểm tiếp theo (phút)');
            $table->integer('khoang_cach_di_chuyen')->default(0)->comment('Khoảng cách đến điểm tiếp theo (mét)');
            $table->text('hinh_hoc_tuyen_duong')->nullable()->comment('GeoJSON/encoded polyline tới điểm tiếp theo, nếu cần lưu tuyến');
            $table->decimal('chi_phi_du_kien', 12, 2)->default(0);
            $table->boolean('khoa_diem')->default(false)->comment('Khóa điểm cố định, không cho thuật toán đổi');
            $table->text('ghi_chu')->nullable();

            $table->unique(['ma_lich_trinh', 'ngay_thu_may', 'thu_tu'], 'uq_lt_ngay_thu_tu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_lich_trinh');
    }
};
