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
        Schema::create('ho_so_doi_tac', function (Blueprint $table) {
            $table->bigIncrements('ma_doi_tac');
            $table->unsignedBigInteger('ma_nguoi_dung')->unique();
            $table->string('ten_cong_ty', 255);
            $table->string('ma_so_thue', 50)->unique();
            $table->string('giay_phep_kinh_doanh_url', 255)->nullable();
            $table->string('dia_chi', 255);
            $table->string('email_lien_he', 255)->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('trang_thai_duyet', 20)->default('cho_duyet')->comment('cho_duyet, da_duyet, tu_choi');
            $table->timestamp('ngay_duyet')->nullable();
            $table->text('ly_do_tu_choi')->nullable();
            $table->unsignedBigInteger('nguoi_duyet_id')->nullable();
            $table->timestamp('ngay_tao')->useCurrent();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ho_so_doi_tac');
    }
};
