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
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->boolean('is_xac_thuc')->default(0)->after('is_block');
            $table->string('ma_xac_thuc')->nullable()->after('is_xac_thuc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            $table->dropColumn(['is_xac_thuc', 'ma_xac_thuc']);
        });
    }
};
