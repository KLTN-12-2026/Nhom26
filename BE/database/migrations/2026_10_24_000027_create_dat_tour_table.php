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
        Schema::create('dat_tour', function (Blueprint $table) {
            $table->bigIncrements('ma_dat_tour');
            $table->string('ma_don_hang', 50)->unique();
            $table->unsignedBigInteger('ma_nguoi_dung');
            $table->unsignedBigInteger('ma_lich_khoi_hanh');
            $table->unsignedBigInteger('ma_voucher')->nullable();
            $table->timestamp('ngay_ap_dung_voucher')->nullable()->comment('Thoi diem voucher duoc tru quota; NULL neu khong ap dung');
            $table->integer('so_nguoi')->default(1)->comment('CHECK so_nguoi > 0');
            $table->decimal('tong_tien', 12, 2)->comment('CHECK tong_tien >= 0; snapshot gia goc tai luc dat');
            $table->decimal('so_tien_giam', 12, 2)->default(0)->comment('CHECK 0 <= so_tien_giam <= tong_tien');
            $table->decimal('thanh_tien', 12, 2)->comment('CHECK thanh_tien = tong_tien - so_tien_giam; snapshot tien chot');
            $table->string('trang_thai', 20)->default('cho_xac_nhan')->comment('cho_xac_nhan, da_xac_nhan, tu_choi, da_huy, hoan_thanh');
            $table->text('ghi_chu')->nullable();
            $table->text('ly_do_tu_choi')->nullable();
            $table->text('ly_do_huy')->nullable();
            $table->timestamp('ngay_huy')->nullable();
            $table->timestamp('het_han_giu_cho')->nullable()->comment('Thoi han giu cho cho don chua xac nhan, tac vu nen giai phong cho');
            $table->integer('phien_ban_chinh_sach')->default(1)->comment('Phien ban chinh sach tai thoi diem dat; khong sua lich su');
            $table->decimal('ti_le_hoan_chot', 5, 2)->nullable()->comment('Ty le da chot khi duyet huy, tinh theo phan tram');
            $table->decimal('so_tien_hoan_lai', 12, 2)->default(0)->comment('Snapshot so tien can hoan khi huy');
            $table->unsignedBigInteger('nguoi_xu_ly_id')->nullable();
            $table->timestamp('ngay_xu_ly')->nullable();
            $table->timestamp('ngay_dat')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_tour');
    }
};
