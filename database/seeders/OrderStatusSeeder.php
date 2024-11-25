<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\now;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['id' => 1, 'name' => 'pendiente', 'description' => 'El pedido ha sido registrado pero no ha sido procesado', 'created_at' => now()],
            ['id' => 2, 'name' => 'procesando', 'description' => 'El pedido está siendo procesado', 'created_at' => now()],
            ['id' => 3, 'name' => 'completado', 'description' => 'El pedido ha sido procesado y completado', 'created_at' => now()],
            ['id' => 4, 'name' => 'cancelado', 'description' => 'El pedido ha sido cancelado', 'created_at' => now()]
        ]);

    }
}
