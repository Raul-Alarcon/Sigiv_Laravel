<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\now;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('application_statuses')->insert([
            ['id' => 1, 'name' => 'pendiente', 'description' => 'La solicitud está pendiente de autorización', 'created_at' => now()],
            ['id' => 2, 'name' => 'aprobada', 'description' => 'La solicitud ha sido aprobada', 'created_at' => now()],
            ['id' => 3, 'name' => 'rechazada', 'description' => 'La solicitud ha sido rechazada', 'created_at' => now()],
            ['id' => 4, 'name' => 'completada', 'description' => 'La solicitud ha sido completada y los productos han salido de la bodega', 'created_at' => now()]
        ]);
    }
}
