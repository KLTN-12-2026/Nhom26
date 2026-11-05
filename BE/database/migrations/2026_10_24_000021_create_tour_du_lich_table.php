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
        Schema::create('tour_du_lich', function (Blueprint $table) {
            $table->bigIncrements('ma_tour');
            $table->unsignedBigInteger('ma_doi_tac');
            $table->string('ten_tour', 255);
            $table->text('mo_ta')->nullable();
            $table->integer('so_ngay')->default(1);
            $table->decimal('gia_nguoi_lon', 12, 2)->comment('Gia nguoi lon hien hanh; gia tour thuc te snapshot hoa don');
            $table->decimal('gia_tre_em', 12, 2)->default(0);
            $table->decimal('gia_em_be', 12, 2)->default(0);
            $table->string('diem_tap_trung', 255)->comment('Diem hen doc lap voi danh sach dia diem trong tuyen; nguon du lieu duy nhat');
            $table->decimal('vi_do_tap_trung', 10, 8)->nullable();
            $table->decimal('kinh_do_tap_trung', 11, 8)->nullable();
            $table->text('noi_dung_bao_gom')->nullable();
            $table->text('noi_dung_khong_bao_gom')->nullable();
            $table->string('trang_thai_duyet', 20)->default('cho_duyet')->comment('cho_duyet, da_duyet, tu_choi, tam_an');
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
        Schema::dropIfExists('tour_du_lich');
    }
};
