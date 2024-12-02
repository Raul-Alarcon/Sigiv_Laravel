<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 

        DB::table('purchasestatuses')->insert([
            [
                'id' => 1,
                'name' => 'Pendiente',
                'description' => 'La compra ha sido registrada pero no ha sido procesada.',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'En Proceso',
                'description' => 'La compra está siendo procesada.',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Completada',
                'description' => 'La compra ha sido procesada y completada.',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Cancelada',
                'description' => 'La compra ha sido cancelada.',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'La compra está esperando el pago.',
                'description' => 'La compra ha sido cancelada.',
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 6, 
                'name' => 'Pagada', 
                'description' => 'La compra ha sido pagada.', 
                'status' => 1, 
                'created_at' => now(),
            ],
            [
                'id' => 7, 
                'name' => 'Enviada', 
                'description' => 
                'La compra ha sido enviada.', 
                'status' => 1, 
                'created_at' => now(),
            ],
            [ 
                'id' => 8, 
                'name' => 'Recibida', 
                'description' => 'Los productos de la compra han sido recibidos.', 
                'status' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 9, 
                'name' => 'Devuelta', 
                'description' => 'La compra ha sido devuelta.', 
                'status' => 1, 
                'created_at' => now(),
            ],
        ]);
    }
}
