<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\now;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['id' => 1, 'name' => 'Ahuachapán', 'code' => 'AH', 'country_id' => 1, 'created_at' => now()],
            ['id' => 2, 'name' => 'San Salvador', 'code' => 'SS', 'country_id' => 1, 'created_at' => now()],
            ['id' => 3, 'name' => 'La Libertad', 'code' => 'LI', 'country_id' => 1, 'created_at' => now()],
            ['id' => 4, 'name' => 'Chalatenango', 'code' => 'CH', 'country_id' => 1, 'created_at' => now()],
            ['id' => 5, 'name' => 'Cuscatlán', 'code' => 'CU', 'country_id' => 1, 'created_at' => now()],
            ['id' => 6, 'name' => 'Cabañas', 'code' => 'CA', 'country_id' => 1, 'created_at' => now()],
            ['id' => 7, 'name' => 'La Paz', 'code' => 'PA', 'country_id' => 1, 'created_at' => now()],
            ['id' => 8, 'name' => 'La Unión', 'code' => 'UN', 'country_id' => 1, 'created_at' => now()],
            ['id' => 9, 'name' => 'Usulután', 'code' => 'US', 'country_id' => 1, 'created_at' => now()],
            ['id' => 10, 'name' => 'Sonsonate', 'code' => 'SO', 'country_id' => 1, 'created_at' => now()],
            ['id' => 11, 'name' => 'Santa Ana', 'code' => 'SA', 'country_id' => 1, 'created_at' => now()],
            ['id' => 12, 'name' => 'San Vicente', 'code' => 'SV', 'country_id' => 1, 'created_at' => now()],
            ['id' => 13, 'name' => 'San Miguel', 'code' => 'SM', 'country_id' => 1, 'created_at' => now()],
            ['id' => 14, 'name' => 'Morazán', 'code' => 'MO', 'country_id' => 1, 'created_at' => now()]
        ]);
    }
}