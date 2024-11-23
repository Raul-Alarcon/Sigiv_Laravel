<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productstatuses')->insert([
            ['id' => 1,
            'name' => 'Activo',
            'description' => 'El producto está disponible para la venta o uso',
            'status' => 1,
            'created_at' => now()],

            ['id' => 2,
            'name' => 'Descontinuado',
            'description' => 'El producto ya no se vende ni se repone',
            'status' => 1,
            'created_at' => now()],

            ['id' => 3,
            'name' => 'Pendiente',
            'description' => 'El producto ha sido pedido pero aún no ha llegado al almacén',
            'status' => 1,
            'created_at' => now()],

            ['id' => 4,
            'name' => 'Reservado',
            'description' => 'El producto está reservado para un pedido específico y no disponible para otras ventas',
            'status' => 1,
            'created_at' => now()],

            ['id' => 5,
            'name' => 'Dañado',
            'description' => 'El producto está dañado y no puede ser vendido',
            'status' => 1,
            'created_at' => now()],

            ['id' => 6,
            'name' => 'Devuelto',
            'description' => 'El producto ha sido devuelto por un cliente',
            'status' => 1,
            'created_at' => now()],

            ['id' => 7,
            'name' => 'En Inspección',
            'description' => 'El producto está siendo inspeccionado para determinar su estado',
            'status' => 1,
            'created_at' => now()],

            ['id' => 8,
            'name' => 'En Transferencia',
            'description' => 'El producto está siendo transferido a otra ubicación o bodega',
            'status' => 1,
            'created_at' => now()],

            ['id' => 9,
            'name' => 'En Producción',
            'description' => 'El producto está en proceso de fabricación',
            'status' => 1,
            'created_at' => now()]
        ]);
    }
}
