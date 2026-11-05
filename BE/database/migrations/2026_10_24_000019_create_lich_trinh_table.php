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
        Schema::create('lich_trinh', function (Blueprint $table) {
            $table->bigIncrements('ma_lich_trinh');
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedBigInteger('ma_lich_trinh_goc')->nullable()->comment('Nguồn sao chép nếu có');
            $table->boolean('la_cong_khai')->default(false);
            $table->string('ten_lich_trinh', 255);
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->decimal('tong_ngan_sach', 12, 2);
            $table->integer('so_nguoi')->default(1);
            $table->string('phuong_tien', 20)->default('xe_may')->comment('di_bo, xe_may, o_to');
            $table->string('nhip_do', 20)->default('vua_phai')->comment('thu_tha, vua_phai, day_dac');
            $table->decimal('tong_chi_phi_du_kien', 12, 2)->default(0)->comment('Gia tri tong hop cache tu chi tiet lich trinh; cap nhat dong bo');
            $table->decimal('ti_le_phu_hop', 5, 2)->nullable()->comment('Mức độ phù hợp với sở thích tính theo %');
            $table->string('trang_thai', 20)->default('da_luu')->comment('nhap, da_luu, hoan_thanh');
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
            $table->softDeletes('ngay_xoa')->comment('Xóa mềm lịch trình');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_trinh');
    }
};
