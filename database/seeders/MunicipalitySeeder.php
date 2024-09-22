<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('municipalities')->insert([
            // Ahuachapán
            ['id' => 1, 'name' => 'Ahuachapán Norte', 'department_id' => 1, 'code' => 'AHN', 'created_at' => now()],
            ['id' => 2, 'name' => 'Ahuachapán Centro', 'department_id' => 1, 'code' => 'AHC', 'created_at' => now()],
            ['id' => 3, 'name' => 'Ahuachapán Sur', 'department_id' => 1, 'code' => 'AHS', 'created_at' => now()],

            // San Salvador
            ['id' => 4, 'name' => 'San Salvador Norte', 'department_id' => 2, 'code' => 'SSN', 'created_at' => now()],
            ['id' => 5, 'name' => 'San Salvador Oeste', 'department_id' => 2, 'code' => 'SSO', 'created_at' => now()],
            ['id' => 6, 'name' => 'San Salvador Este', 'department_id' => 2, 'code' => 'SSE', 'created_at' => now()],
            ['id' => 7, 'name' => 'San Salvador Centro', 'department_id' => 2, 'code' => 'SSC', 'created_at' => now()],
            ['id' => 8, 'name' => 'San Salvador Sur', 'department_id' => 2, 'code' => 'SSS', 'created_at' => now()],

            // La Libertad
            ['id' => 9, 'name' => 'La Libertad Norte', 'department_id' => 3, 'code' => 'LLN', 'created_at' => now()],
            ['id' => 10, 'name' => 'La Libertad Centro', 'department_id' => 3, 'code' => 'LLC', 'created_at' => now()],
            ['id' => 11, 'name' => 'La Libertad Oeste', 'department_id' => 3, 'code' => 'LLO', 'created_at' => now()],
            ['id' => 12, 'name' => 'La Libertad Este', 'department_id' => 3, 'code' => 'LLE', 'created_at' => now()],
            ['id' => 13, 'name' => 'La Libertad Costa', 'department_id' => 3, 'code' => 'LLC', 'created_at' => now()],
            ['id' => 14, 'name' => 'La Libertad Sur', 'department_id' => 3, 'code' => 'LLS', 'created_at' => now()],

            // Chalatenango
            ['id' => 15, 'name' => 'Chalatenango Norte', 'department_id' => 4, 'code' => 'CHN', 'created_at' => now()],
            ['id' => 16, 'name' => 'Chalatenango Centro', 'department_id' => 4, 'code' => 'CHC', 'created_at' => now()],
            ['id' => 17, 'name' => 'Chalatenango Sur', 'department_id' => 4, 'code' => 'CHS', 'created_at' => now()],

            // Cuscatlán
            ['id' => 18, 'name' => 'Cuscatlán Norte', 'department_id' => 5, 'code' => 'CUSN', 'created_at' => now()],
            ['id' => 19, 'name' => 'Cuscatlán Sur', 'department_id' => 5, 'code' => 'CUSS', 'created_at' => now()],

            // Cabañas
            ['id' => 20, 'name' => 'Cabañas Este', 'department_id' => 6, 'code' => 'CABO', 'created_at' => now()],
            ['id' => 21, 'name' => 'Cabañas Oeste', 'department_id' => 6, 'code' => 'CABW', 'created_at' => now()],

            // La Paz
            ['id' => 22, 'name' => 'La Paz Oeste', 'department_id' => 7, 'code' => 'LPO', 'created_at' => now()],
            ['id' => 23, 'name' => 'La Paz Centro', 'department_id' => 7, 'code' => 'LPC', 'created_at' => now()],
            ['id' => 24, 'name' => 'La Paz Este', 'department_id' => 7, 'code' => 'LPE', 'created_at' => now()],

            // La Unión
            ['id' => 25, 'name' => 'La Unión Norte', 'department_id' => 8, 'code' => 'LUN', 'created_at' => now()],
            ['id' => 26, 'name' => 'La Unión Sur', 'department_id' => 8, 'code' => 'LUS', 'created_at' => now()],

            // Usulután
            ['id' => 27, 'name' => 'Usulután Norte', 'department_id' => 9, 'code' => 'USN', 'created_at' => now()],
            ['id' => 28, 'name' => 'Usulután Este', 'department_id' => 9, 'code' => 'USE', 'created_at' => now()],
            ['id' => 29, 'name' => 'Usulután Oeste', 'department_id' => 9, 'code' => 'USO', 'created_at' => now()],

            // Sonsonate
            ['id' => 30, 'name' => 'Sonsonate Norte', 'department_id' => 10, 'code' => 'SONN', 'created_at' => now()],
            ['id' => 31, 'name' => 'Sonsonate Centro', 'department_id' => 10, 'code' => 'SONC', 'created_at' => now()],
            ['id' => 32, 'name' => 'Sonsonate Este', 'department_id' => 10, 'code' => 'SONE', 'created_at' => now()],
            ['id' => 33, 'name' => 'Sonsonate Oeste', 'department_id' => 10, 'code' => 'SONW', 'created_at' => now()],

            // Santa Ana
            ['id' => 34, 'name' => 'Santa Ana Norte', 'department_id' => 11, 'code' => 'SAN', 'created_at' => now()],
            ['id' => 35, 'name' => 'Santa Ana Centro', 'department_id' => 11, 'code' => 'SAC', 'created_at' => now()],
            ['id' => 36, 'name' => 'Santa Ana Este', 'department_id' => 11, 'code' => 'SAE', 'created_at' => now()],
            ['id' => 37, 'name' => 'Santa Ana Oeste', 'department_id' => 11, 'code' => 'SAO', 'created_at' => now()],

            // San Vicente
            ['id' => 38, 'name' => 'San Vicente Norte', 'department_id' => 12, 'code' => 'SVN', 'created_at' => now()],
            ['id' => 39, 'name' => 'San Vicente Sur', 'department_id' => 12, 'code' => 'SVS', 'created_at' => now()],

            // San Miguel
            ['id' => 40, 'name' => 'San Miguel Norte', 'department_id' => 13, 'code' => 'SMN', 'created_at' => now()],
            ['id' => 41, 'name' => 'San Miguel Centro', 'department_id' => 13, 'code' => 'SMC', 'created_at' => now()],
            ['id' => 42, 'name' => 'San Miguel Oeste', 'department_id' => 13, 'code' => 'SMO', 'created_at' => now()],

            // Morazán
            ['id' => 43, 'name' => 'Morazán Norte', 'department_id' => 14, 'code' => 'MON', 'created_at' => now()],
            ['id' => 44, 'name' => 'Morazán Sur', 'department_id' => 14, 'code' => 'MOS', 'created_at' => now()],
        ]);
    }
}
