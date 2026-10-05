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
        Schema::create('doi_soat_hoa_hongs', function (Blueprint $table) {
            $table->id('ma_doi_soat');
            $table->string('ma_hoa_don');
            $table->string('ma_doi_tac');
            $table->decimal('tong_tien_giao_dich', 15, 2)->nullable();
            $table->decimal('phan_tram_hoa_hong', 5, 2)->nullable();
            $table->decimal('tien_hoa_hong_admin', 15, 2)->nullable();
            $table->decimal('tien_doi_tac_thuc_nhan', 15, 2)->nullable();
            $table->integer('trang_thai_thanh_toan')->default(0);
            $table->dateTime('ngay_doi_soat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doi_soat_hoa_hongs');
    }
};