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
        Schema::create('voucher', function (Blueprint $table) {
            $table->bigIncrements('ma_voucher');
            $table->unsignedBigInteger('nguoi_tao_id')->comment('Admin hoặc Đối tác');
            $table->unsignedBigInteger('ma_doi_tac')->nullable()->comment('Null = Toàn hệ thống; có giá trị = đối tác');
            $table->string('ma_giam_gia', 50)->unique();
            $table->string('loai_giam_gia', 20)->comment('phan_tram, tien_mat');
            $table->decimal('gia_tri_giam', 12, 2);
            $table->decimal('gia_tri_don_toi_thieu', 12, 2)->default(0);
            $table->decimal('giam_toi_da', 12, 2)->nullable();
            $table->timestamp('ngay_bat_dau');
            $table->timestamp('ngay_ket_thuc');
            $table->integer('gioi_han_su_dung')->default(100);
            $table->integer('so_lan_da_dung')->default(0)->comment('Bo dem cach ly tinh tu lich su voucher, phai dong bo trong transaction');
            $table->boolean('trang_thai_kich_hoat')->default(true);
            $table->timestamp('ngay_tao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
