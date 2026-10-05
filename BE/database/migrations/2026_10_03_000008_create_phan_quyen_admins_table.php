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
        Schema::create('phan_quyen_admins', function (Blueprint $table) {
            $table->string('ma_phan_quyen')->primary();
            $table->string('ma_chuc_nang');
            $table->string('ma_chuc_vu');
            $table->boolean('quyen_xem')->default(0);
            $table->boolean('quyen_them')->default(0);
            $table->boolean('quyen_sua')->default(0);
            $table->boolean('quyen_xoa')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_quyen_admins');
    }
};