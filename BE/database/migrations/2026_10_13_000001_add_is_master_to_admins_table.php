<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('admins', 'is_master')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->integer('is_master')->default(0)->after('is_block');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('admins', 'is_master')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->dropColumn('is_master');
            });
        }
    }
};
