<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->insert([
            'id' => 1,
            'name' => 'El Salvador',
            'code' => 'SV',
            'created_at' => now(),
        ]);
    }
}