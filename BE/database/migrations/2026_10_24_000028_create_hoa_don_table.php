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
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->bigIncrements('ma_hoa_don');
            $table->unsignedBigInteger('ma_dat_tour')->unique();
            $table->decimal('tong_tien', 12, 2)->comment('Snapshot tong tien phat hanh hoa don; doi chieu dat_tour.thanh_tien tai thoi diem lap');
            $table->string('trang_thai', 20)->default('chua_thanh_toan')->comment('chua_thanh_toan, da_thanh_toan, hoan_tien, huy');
            $table->timestamp('ngay_lap')->useCurrent();
            $table->timestamp('ngay_thanh_toan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don');
    }
};
