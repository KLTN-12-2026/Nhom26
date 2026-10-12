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
        Schema::table('chuc_nangs', function (Blueprint $table) {
            $table->string('duong_dan')->nullable()->after('ten_chuc_nang');
            $table->tinyInteger('trang_thai')->default(1)->after('duong_dan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chuc_nangs', function (Blueprint $table) {
            $table->dropColumn(['duong_dan', 'trang_thai']);
        });
    }
};
