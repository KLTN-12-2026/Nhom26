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
        Schema::create('xa_phuong', function (Blueprint $table) {
            $table->string('ma_xa', 10)->primary()->comment('Ma cap xa theo danh muc chinh thuc');
            $table->string('ma_tinh', 10)->index();
            $table->string('ten_xa', 150);
            $table->string('loai_don_vi', 30)->comment('xa, phuong, dac_khu');
            $table->boolean('dang_hoat_dong')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xa_phuong');
    }
};
