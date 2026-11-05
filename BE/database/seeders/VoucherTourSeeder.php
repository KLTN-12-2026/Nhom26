<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('voucher_tour')->insert([
            ['ma_voucher' => 2, 'ma_tour' => 1],
        ]);
    }
}