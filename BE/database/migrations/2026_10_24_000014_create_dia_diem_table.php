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
        Schema::create('dia_diem', function (Blueprint $table) {
            $table->bigIncrements('ma_dia_diem');
            $table->unsignedInteger('ma_danh_muc');
            $table->string('ma_xa', 10);
            $table->string('ma_huyen_cu', 10)->nullable()->comment('Tuy chon; chi dung cho tra cuu dia danh quan/huyen truoc 01-07-2025');
            $table->unsignedBigInteger('nguoi_tao_id')->comment('Admin hoặc Đối tác đề xuất');
            $table->string('ten_dia_diem', 255);
            $table->text('mo_ta')->nullable();
            $table->string('dia_chi', 255);
            $table->decimal('vi_do', 10, 8);
            $table->decimal('kinh_do', 11, 8);
            $table->string('osm_id', 100)->nullable()->comment('ID OpenStreetMap nếu đồng bộ');
            $table->time('gio_mo_cua')->nullable()->comment('Giờ mở cửa để thuật toán kiểm tra ràng buộc');
            $table->time('gio_dong_cua')->nullable()->comment('Giờ đóng cửa');
            $table->decimal('gia_tham_khao', 12, 2)->default(0);
            $table->integer('thoi_luong_tham_quan')->default(60)->comment('Thời lượng tính theo phút');
            $table->string('trang_thai_duyet', 20)->default('cho_duyet')->comment('cho_duyet, da_duyet, tu_choi');
            $table->unsignedBigInteger('nguoi_duyet_id')->nullable();
            $table->text('ly_do_tu_choi')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
            $table->softDeletes('ngay_xoa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem');
    }
};
