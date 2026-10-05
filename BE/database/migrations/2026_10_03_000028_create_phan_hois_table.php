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
        Schema::create('phan_hois', function (Blueprint $table) {
            $table->id();
            $table->string('ma_khach_hang');
            $table->string('tieu_de')->nullable();
            $table->string('loai')->nullable();
            $table->text('mo_ta')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('ma_admin_xu_ly')->nullable();
            $table->text('phan_hoi_admin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_hois');
    }
};