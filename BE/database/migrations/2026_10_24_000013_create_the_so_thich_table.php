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
        Schema::create('the_so_thich', function (Blueprint $table) {
            $table->increments('ma_the');
            $table->string('ten_the', 50)->unique()->comment('Rừng, Núi, Suối, Thác, Biển, Check-in, Ẩm thực,...');
            $table->string('nhom_the', 50)->nullable()->comment('thien_nhien, van_hoa, hoat_dong');
            $table->string('mo_ta', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_so_thich');
    }
};
