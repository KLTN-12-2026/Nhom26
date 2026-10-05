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
        Schema::create('dich_vus', function (Blueprint $table) {
            $table->string('ma_dich_vu')->primary();
            $table->string('ma_doi_tac');
            $table->string('ma_dia_diem')->nullable();
            $table->string('ten_dich_vu');
            $table->string('loai_dich_vu')->nullable();
            $table->text('mo_ta')->nullable();
            $table->decimal('don_gia', 15, 2)->nullable();
            $table->string('don_vi_tinh')->nullable();
            $table->string('trang_thai_duyet')->nullable();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dich_vus');
    }
};