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
        Schema::table('doi_tacs', function (Blueprint $table) {
            $table->string('ma_so_thue')->nullable()->after('ten_doi_tac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doi_tacs', function (Blueprint $table) {
            $table->dropColumn('ma_so_thue');
        });
    }
};
