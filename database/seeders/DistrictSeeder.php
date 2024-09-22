<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            /*DEPARTAMENTO DE AHUACHAPÁN*/
            /*Ahuachapan Norte: Distrito de Atiquizaya, Distrito de El Refugio, Distrito de San Lorenzo, Distrito de Turín*/
            ['id' => 1, 'name' => 'Distrito de Atiquizaya', 'municipality_id' => 1, 'code' => 'DAT', 'created_at' => now()],
            ['id' => 2, 'name' => 'Distrito de El Refugio', 'municipality_id' => 1, 'code' => 'DER', 'created_at' => now()],
            ['id' => 3, 'name' => 'Distrito de San Lorenzo', 'municipality_id' => 1, 'code' => 'DSL', 'created_at' => now()],
            ['id' => 4, 'name' => 'Distrito de Turín', 'municipality_id' => 1, 'code' => 'DTU', 'created_at' => now()],

            /*Ahuachapan Centro: Distrito de Ahuachapán, Distrito de Apaneca, Distrito de Concepción de Ataco, Distrito de Tacuba*/
            ['id' => 5, 'name' => 'Distrito de Ahuachapán', 'municipality_id' => 2, 'code' => 'DAH', 'created_at' => now()],
            ['id' => 6, 'name' => 'Distrito de Apaneca', 'municipality_id' => 2, 'code' => 'DAP', 'created_at' => now()],
            ['id' => 7, 'name' => 'Distrito de Concepción de Ataco', 'municipality_id' => 2, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 8, 'name' => 'Distrito de Tacuba', 'municipality_id' => 2, 'code' => 'DTA', 'created_at' => now()],

            /*Municipio de Ahuachapán Sur: Distrito de Guaymango, Distrito de Jujutla, Distrito de San Francisco Menendez, Distrito de San Pedro Puxtla*/
            ['id' => 9, 'name' => 'Distrito de Guaymango', 'municipality_id' => 3, 'code' => 'DGM', 'created_at' => now()],
            ['id' => 10, 'name' => 'Distrito de Jujutla', 'municipality_id' => 3, 'code' => 'DJU', 'created_at' => now()],
            ['id' => 11, 'name' => 'Distrito de San Francisco Menendez', 'municipality_id' => 3, 'code' => 'DSF', 'created_at' => now()],
            ['id' => 12, 'name' => 'Distrito de San Pedro Puxtla', 'municipality_id' => 3, 'code' => 'DSP', 'created_at' => now()],

            /*Municipio de San Salvador Norte: Distrito de Aguilares, Distrito de El Paisnal, Distrito de Guazapa*/
            ['id' => 13, 'name' => 'Distrito de Aguilares', 'municipality_id' => 4, 'code' => 'DAG', 'created_at' => now()],
            ['id' => 14, 'name' => 'Distrito de El Paisnal', 'municipality_id' => 4, 'code' => 'DEP', 'created_at' => now()],
            ['id' => 15, 'name' => 'Distrito de Guazapa', 'municipality_id' => 4, 'code' => 'DGU', 'created_at' => now()],

            /*Municipio de San Salvador Oeste: Distrito de Apopa, Distrito de Nejapa*/
            ['id' => 16, 'name' => 'Distrito de Apopa', 'municipality_id' => 5, 'code' => 'DAP', 'created_at' => now()],
            ['id' => 17, 'name' => 'Distrito de Nejapa', 'municipality_id' => 5, 'code' => 'DNE', 'created_at' => now()],

            /*Municipio de San Salvador Este: Distrito de llopango, Distrito de San Martín, Distrito de Soyapango, Distrito de Tonacatepeque*/
            ['id' => 18, 'name' => 'Distrito de Ilopango', 'municipality_id' => 6, 'code' => 'DIL', 'created_at' => now()],
            ['id' => 19, 'name' => 'Distrito de San Martín', 'municipality_id' => 6, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 20, 'name' => 'Distrito de Soyapango', 'municipality_id' => 6, 'code' => 'DSO', 'created_at' => now()],
            ['id' => 21, 'name' => 'Distrito de Tonacatepeque', 'municipality_id' => 6, 'code' => 'DTO', 'created_at' => now()],

            /*Municipio de San Salvador Centro: Distrito de Ayutuxtepeque, Distrito de Mejicanos, Distrito de San Salvador, Distrito de Cuscatancingo, Distrito de Ciudad Delgado*/
            ['id' => 22, 'name' => 'Distrito de Ayutuxtepeque', 'municipality_id' => 7, 'code' => 'DAY', 'created_at' => now()],
            ['id' => 23, 'name' => 'Distrito de Mejicanos', 'municipality_id' => 7, 'code' => 'DME', 'created_at' => now()],
            ['id' => 24, 'name' => 'Distrito de San Salvador', 'municipality_id' => 7, 'code' => 'DSS', 'created_at' => now()],
            ['id' => 25, 'name' => 'Distrito de Cuscatancingo', 'municipality_id' => 7, 'code' => 'DCU', 'created_at' => now()],
            ['id' => 26, 'name' => 'Distrito de Ciudad Delgado', 'municipality_id' => 7, 'code' => 'DCD', 'created_at' => now()],

            /*Municipio de San Salvador Sur: Distrito de Panchimalco, Distrito de Rosario de Mora, Distrito de San Marcos, Distrito de Santo Tomás, Distrito de Santiago Texacuangos*/
            ['id' => 27, 'name' => 'Distrito de Panchimalco', 'municipality_id' => 8, 'code' => 'DPA', 'created_at' => now()],
            ['id' => 28, 'name' => 'Distrito de Rosario de Mora', 'municipality_id' => 8, 'code' => 'DRO', 'created_at' => now()],
            ['id' => 29, 'name' => 'Distrito de San Marcos', 'municipality_id' => 8, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 30, 'name' => 'Distrito de Santo Tomás', 'municipality_id' => 8, 'code' => 'DST', 'created_at' => now()],
            ['id' => 31, 'name' => 'Distrito de Santiago Texacuangos', 'municipality_id' => 8, 'code' => 'DST', 'created_at' => now()],

            /*Municipio de La Libertad Norte: Distrito de Quezaltepeque, Distrito de San Matías, Distrito de San Pablo Tacachico*/
            ['id' => 32, 'name' => 'Distrito de Quezaltepeque', 'municipality_id' => 9, 'code' => 'DQU', 'created_at' => now()],
            ['id' => 33, 'name' => 'Distrito de San Matías', 'municipality_id' => 9, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 34, 'name' => 'Distrito de San Pablo Tacachico', 'municipality_id' => 9, 'code' => 'DST', 'created_at' => now()],

            /*Municipio de La Libertad Centro: Distrito de San Juan Opico,Distrito de Ciudad Arce*/
            ['id' => 35, 'name' => 'Distrito de San Juan Opico', 'municipality_id' => 10, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 36, 'name' => 'Distrito de Ciudad Arce', 'municipality_id' => 10, 'code' => 'DCA', 'created_at' => now()],

            /*Municipio de La Libertad Oeste: Distrito de Colón, Distrito de Jayaque, Distrito de Sacacoyo, Distrito de Tepecoyo, Distrito de Talnique*/
            ['id' => 37, 'name' => 'Distrito de Colón', 'municipality_id' => 11, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 38, 'name' => 'Distrito de Jayaque', 'municipality_id' => 11, 'code' => 'DJA', 'created_at' => now()],
            ['id' => 39, 'name' => 'Distrito de Sacacoyo', 'municipality_id' => 11, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 40, 'name' => 'Distrito de Tepecoyo', 'municipality_id' => 11, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 41, 'name' => 'Distrito de Talnique', 'municipality_id' => 11, 'code' => 'DTA', 'created_at' => now()],

            /*Municipio de La Libertad Este: Distrito de Antiguo Cuscatlán, Distrito de Huizucar, Distrito de Nuevo Cuscatlán, Distrito de San José Villanueva, Distrito de Zaragoza*/
            ['id' => 42, 'name' => 'Distrito de Antiguo Cuscatlán', 'municipality_id' => 12, 'code' => 'DAC', 'created_at' => now()],
            ['id' => 43, 'name' => 'Distrito de Huizucar', 'municipality_id' => 12, 'code' => 'DHU', 'created_at' => now()],
            ['id' => 44, 'name' => 'Distrito de Nuevo Cuscatlán', 'municipality_id' => 12, 'code' => 'DNC', 'created_at' => now()],
            ['id' => 45, 'name' => 'Distrito de San José Villanueva', 'municipality_id' => 12, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 46, 'name' => 'Distrito de Zaragoza', 'municipality_id' => 12, 'code' => 'DZA', 'created_at' => now()],

            /*Municipio de La Libertad Costa: Distrito de Chiltuipán, Distrito de Jicalapa, Distrito de La Libertad, Distrito de Tamanique, Distrito de Teotepeque*/
            ['id' => 47, 'name' => 'Distrito de Chiltuipán', 'municipality_id' => 13, 'code' => 'DCH', 'created_at' => now()],
            ['id' => 48, 'name' => 'Distrito de Jicalapa', 'municipality_id' => 13, 'code' => 'DJI', 'created_at' => now()],
            ['id' => 49, 'name' => 'Distrito de La Libertad', 'municipality_id' => 13, 'code' => 'DLL', 'created_at' => now()],
            ['id' => 50, 'name' => 'Distrito de Tamanique', 'municipality_id' => 13, 'code' => 'DTA', 'created_at' => now()],
            ['id' => 51, 'name' => 'Distrito de Teotepeque', 'municipality_id' => 13, 'code' => 'DTE', 'created_at' => now()],

            /*Municipio de La Libertad Sur: Distrito de Comasagua, Distrito de Santa Tecla*/
            ['id' => 52, 'name' => 'Distrito de Comasagua', 'municipality_id' => 14, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 53, 'name' => 'Distrito de Santa Tecla', 'municipality_id' => 14, 'code' => 'DST', 'created_at' => now()],

            /*Municipio de Chalatenango Norte: Distrito de La Palma, Distrito de Citalá, Distrito de San Ignacio*/
            ['id' => 54, 'name' => 'Distrito de La Palma', 'municipality_id' => 15, 'code' => 'DLP', 'created_at' => now()],
            ['id' => 55, 'name' => 'Distrito de Citalá', 'municipality_id' => 15, 'code' => 'DCI', 'created_at' => now()],
            ['id' => 56, 'name' => 'Distrito de San Ignacio', 'municipality_id' => 15, 'code' => 'DSI', 'created_at' => now()],

            /*Municipio de Chalatenango Centro: Distrito de Nueva Concepción, Distrito de Tejutla, Distrito de La Reina, Distrito de Agua Caliente, Distrito de Dulce Nombre de María, Distrito de El Paraíso, Distrito de San Francisco Morazán, Distrito de San Rafael, Distrito de Santa Rita, Distrito de San Fernando*/
            ['id' => 57, 'name' => 'Distrito de Nueva Concepción', 'municipality_id' => 16, 'code' => 'DNC', 'created_at' => now()],
            ['id' => 58, 'name' => 'Distrito de Tejutla', 'municipality_id' => 16, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 59, 'name' => 'Distrito de La Reina', 'municipality_id' => 16, 'code' => 'DLR', 'created_at' => now()],
            ['id' => 60, 'name' => 'Distrito de Agua Caliente', 'municipality_id' => 16, 'code' => 'DAC', 'created_at' => now()],
            ['id' => 61, 'name' => 'Distrito de Dulce Nombre de María', 'municipality_id' => 16, 'code' => 'DDN', 'created_at' => now()],
            ['id' => 62, 'name' => 'Distrito de El Paraíso', 'municipality_id' => 16, 'code' => 'DEP', 'created_at' => now()],
            ['id' => 63, 'name' => 'Distrito de San Francisco Morazán', 'municipality_id' => 16, 'code' => 'DSF', 'created_at' => now()],
            ['id' => 64, 'name' => 'Distrito de San Rafael', 'municipality_id' => 16, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 65, 'name' => 'Distrito de Santa Rita', 'municipality_id' => 16, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 66, 'name' => 'Distrito de San Fernando', 'municipality_id' => 16, 'code' => 'DSF', 'created_at' => now()],

            /*Municipio de Chalatenango Sur: Distrito de Chalatenango, Distrito de Arcatao, Distrito de Azacualpa, Distrito de Comalapa, Distrito de Concepción Quezaltepeque, Distrito de El Carrizal, Distrito de La Laguna, Distrito de Las Vueltas, Distrito de Nombre de Jesús, Distrito de Nueva Trinidad, Distrito de Ojos de Agua, Distrito de Potonico, Distrito de San Antonio de La Cruz, Distrito de San Antonio Los Ranchos, Distrito de San Francisco Lempa, Distrito de San Isidro Labrador, Distrito de San José Cancasque, Distrito de San Miguel de Mercedes, Distrito de San José Las Flores, Distrito de San Luis del Carmen*/
            ['id' => 67, 'name' => 'Distrito de Chalatenango', 'municipality_id' => 17, 'code' => 'DCH', 'created_at' => now()],
            ['id' => 68, 'name' => 'Distrito de Arcatao', 'municipality_id' => 17, 'code' => 'DAR', 'created_at' => now()],
            ['id' => 69, 'name' => 'Distrito de Azacualpa', 'municipality_id' => 17, 'code' => 'DAZ', 'created_at' => now()],
            ['id' => 70, 'name' => 'Distrito de Comalapa', 'municipality_id' => 17, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 71, 'name' => 'Distrito de Concepción Quezaltepeque', 'municipality_id' => 17, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 72, 'name' => 'Distrito de El Carrizal', 'municipality_id' => 17, 'code' => 'DEC', 'created_at' => now()],
            ['id' => 73, 'name' => 'Distrito de La Laguna', 'municipality_id' => 17, 'code' => 'DLA', 'created_at' => now()],
            ['id' => 74, 'name' => 'Distrito de Las Vueltas', 'municipality_id' => 17, 'code' => 'DLV', 'created_at' => now()],
            ['id' => 75, 'name' => 'Distrito de Nombre de Jesús', 'municipality_id' => 17, 'code' => 'DNJ', 'created_at' => now()],
            ['id' => 76, 'name' => 'Distrito de Nueva Trinidad', 'municipality_id' => 17, 'code' => 'DNT', 'created_at' => now()],
            ['id' => 77, 'name' => 'Distrito de Ojos de Agua', 'municipality_id' => 17, 'code' => 'DOA', 'created_at' => now()],
            ['id' => 78, 'name' => 'Distrito de Potonico', 'municipality_id' => 17, 'code' => 'DPO', 'created_at' => now()],
            ['id' => 79, 'name' => 'Distrito de San Antonio de La Cruz', 'municipality_id' => 17, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 80, 'name' => 'Distrito de San Antonio Los Ranchos', 'municipality_id' => 17, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 81, 'name' => 'Distrito de San Francisco Lempa', 'municipality_id' => 17, 'code' => 'DSF', 'created_at' => now()],
            ['id' => 82, 'name' => 'Distrito de San Isidro Labrador', 'municipality_id' => 17, 'code' => 'DSI', 'created_at' => now()],
            ['id' => 83, 'name' => 'Distrito de San José Cancasque', 'municipality_id' => 17, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 84, 'name' => 'Distrito de San Miguel de Mercedes', 'municipality_id' => 17, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 85, 'name' => 'Distrito de San José Las Flores', 'municipality_id' => 17, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 86, 'name' => 'Distrito de San Luis del Carmen', 'municipality_id' => 17, 'code' => 'DSL', 'created_at' => now()],

            /*Municipio de Cuscatlán Norte: Distrito de Suchitoto, Distrito de San José Guayabal, Distrito de Oratorio de Concepción, Distrito de San Bartolomé Perulapán, Distrito de San Pedro Perulapán*/
            ['id' => 87, 'name' => 'Distrito de Suchitoto', 'municipality_id' => 18, 'code' => 'DSU', 'created_at' => now()],
            ['id' => 88, 'name' => 'Distrito de San José Guayabal', 'municipality_id' => 18, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 89, 'name' => 'Distrito de Oratorio de Concepción', 'municipality_id' => 18, 'code' => 'DOR', 'created_at' => now()],
            ['id' => 90, 'name' => 'Distrito de San Bartolomé Perulapán', 'municipality_id' => 18, 'code' => 'DSB', 'created_at' => now()],
            ['id' => 91, 'name' => 'Distrito de San Pedro Perulapán', 'municipality_id' => 18, 'code' => 'DSP', 'created_at' => now()],


            /*Municipio de Cuscatlán Sur: Distrito de Cojutepeque, Distrito de San Rafael Cedros, Distrito de Candelaria, Distrito de Monte San Juan, Distrito de El Carmen, Distrito de San Cristóbal, Distrito de Santa Cruz Michapa, Distrito de San Ramón, Distrito de El Rosario, Distrito de Santa Cruz Analquito, Distrito de Tenancingo*/
            ['id' => 92, 'name' => 'Distrito de Cojutepeque', 'municipality_id' => 19, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 93, 'name' => 'Distrito de San Rafael Cedros', 'municipality_id' => 19, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 94, 'name' => 'Distrito de Candelaria', 'municipality_id' => 19, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 95, 'name' => 'Distrito de Monte San Juan', 'municipality_id' => 19, 'code' => 'DMS', 'created_at' => now()],
            ['id' => 96, 'name' => 'Distrito de El Carmen', 'municipality_id' => 19, 'code' => 'DEC', 'created_at' => now()],
            ['id' => 97, 'name' => 'Distrito de San Cristóbal', 'municipality_id' => 19, 'code' => 'DSC', 'created_at' => now()],
            ['id' => 98, 'name' => 'Distrito de Santa Cruz Michapa', 'municipality_id' => 19, 'code' => 'DSC', 'created_at' => now()],
            ['id' => 99, 'name' => 'Distrito de San Ramón', 'municipality_id' => 19, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 100, 'name' => 'Distrito de El Rosario', 'municipality_id' => 19, 'code' => 'DER', 'created_at' => now()],
            ['id' => 101, 'name' => 'Distrito de Santa Cruz Analquito', 'municipality_id' => 19, 'code' => 'DSC', 'created_at' => now()],
            ['id' => 102, 'name' => 'Distrito de Tenancingo', 'municipality_id' => 19, 'code' => 'DTE', 'created_at' => now()],


            /*Municipio de Cabañas Este: Distrito de Sensuntepeque, Distrito de Victoria, Distrito de Dolores, Distrito de Guacotecti, Distrito de San Isidro*/
            ['id' => 103, 'name' => 'Distrito de Sensuntepeque', 'municipality_id' => 20, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 104, 'name' => 'Distrito de Victoria', 'municipality_id' => 20, 'code' => 'DVI', 'created_at' => now()],
            ['id' => 105, 'name' => 'Distrito de Dolores', 'municipality_id' => 20, 'code' => 'DDO', 'created_at' => now()],
            ['id' => 106, 'name' => 'Distrito de Guacotecti', 'municipality_id' => 20, 'code' => 'DGA', 'created_at' => now()],
            ['id' => 107, 'name' => 'Distrito de San Isidro', 'municipality_id' => 20, 'code' => 'DSI', 'created_at' => now()],

            /*Municipio de Cabañas Oeste: Distrito de llobasco, Distrito de Tejutepeque, Distrito de Jutiapa, Distrito de Cinquera*/
            ['id' => 108, 'name' => 'Distrito de llobasco', 'municipality_id' => 21, 'code' => 'DIL', 'created_at' => now()],
            ['id' => 109, 'name' => 'Distrito de Tejutepeque', 'municipality_id' => 21, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 110, 'name' => 'Distrito de Jutiapa', 'municipality_id' => 21, 'code' => 'DJU', 'created_at' => now()],
            ['id' => 111, 'name' => 'Distrito de Cinquera', 'municipality_id' => 21, 'code' => 'DCI', 'created_at' => now()],

            /*DEPARTAMENTO DE LA PAZ: Municipio de La Paz Oeste, Distrito de Cuyultitán, Distrito de Olocuilta, Distrito de San Juan Talpa, Distrito de San Luis Talpa, Distrito de San Pedro Masahuat, Distrito de Tapalhuaca, Distrito de San Francisco Chinameca*/
            ['id' => 112, 'name' => 'Distrito de Cuyultitán', 'municipality_id' => 22, 'code' => 'DCU', 'created_at' => now()],
            ['id' => 113, 'name' => 'Distrito de Olocuilta', 'municipality_id' => 22, 'code' => 'DOL', 'created_at' => now()],
            ['id' => 114, 'name' => 'Distrito de San Juan Talpa', 'municipality_id' => 22, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 115, 'name' => 'Distrito de San Luis Talpa', 'municipality_id' => 22, 'code' => 'DSL', 'created_at' => now()],
            ['id' => 116, 'name' => 'Distrito de San Pedro Masahuat', 'municipality_id' => 22, 'code' => 'DSP', 'created_at' => now()],
            ['id' => 117, 'name' => 'Distrito de Tapalhuaca', 'municipality_id' => 22, 'code' => 'DTA', 'created_at' => now()],
            ['id' => 118, 'name' => 'Distrito de San Francisco Chinameca', 'municipality_id' => 22, 'code' => 'DSF', 'created_at' => now()],

            /*Municipio de La Paz Centro: Distrito de El Rosario, Distrito de Jerusalén, Distrito de Mercedes La Ceiba, Distrito de Paraíso de Osorio, Distrito de San Antonio Masahuat, Distrito de San Emigdio, Distrito de San Juan Tepezontes, Distrito de San Luis La Herradura, Distrito de San Miguel Tepezontes, Distrito de San Pedro Nonualco, Distrito de Santa María Ostuma, Distrito de Santiago Nonualco*/
            ['id' => 119, 'name' => 'Distrito de El Rosario', 'municipality_id' => 23, 'code' => 'DER', 'created_at' => now()],
            ['id' => 120, 'name' => 'Distrito de Jerusalén', 'municipality_id' => 23, 'code' => 'DJE', 'created_at' => now()],
            ['id' => 121, 'name' => 'Distrito de Mercedes La Ceiba', 'municipality_id' => 23, 'code' => 'DME', 'created_at' => now()],
            ['id' => 122, 'name' => 'Distrito de Paraíso de Osorio', 'municipality_id' => 23, 'code' => 'DPA', 'created_at' => now()],
            ['id' => 123, 'name' => 'Distrito de San Antonio Masahuat', 'municipality_id' => 23, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 124, 'name' => 'Distrito de San Emigdio', 'municipality_id' => 23, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 125, 'name' => 'Distrito de San Juan Tepezontes', 'municipality_id' => 23, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 126, 'name' => 'Distrito de San Luis La Herradura', 'municipality_id' => 23, 'code' => 'DSL', 'created_at' => now()],
            ['id' => 127, 'name' => 'Distrito de San Miguel Tepezontes', 'municipality_id' => 23, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 128, 'name' => 'Distrito de San Pedro Nonualco', 'municipality_id' => 23, 'code' => 'DSP', 'created_at' => now()],
            ['id' => 129, 'name' => 'Distrito de Santa María Ostuma', 'municipality_id' => 23, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 130, 'name' => 'Distrito de Santiago Nonualco', 'municipality_id' => 23, 'code' => 'DSN', 'created_at' => now()],

            /*Municipio de La Paz Este: Distrito de San Juan Nonualco, Distrito de San Rafael Obrajuelo, Distrito de Zacatecoluca*/
            ['id' => 131, 'name' => 'Distrito de San Juan Nonualco', 'municipality_id' => 24, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 132, 'name' => 'Distrito de San Rafael Obrajuelo', 'municipality_id' => 24, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 133, 'name' => 'Distrito de Zacatecoluca', 'municipality_id' => 24, 'code' => 'DZA', 'created_at' => now()],

            /*Municipio de La Unión Norte: Distrito de Anamorós, Distrito de Bolivar, Distrito de Concepción de Oriente, Distrito de El Sauce, Distrito de Lislique, Distrito de Nueva Esparta, Distrito de Pasaquina, Distrito de Polorós, Distrito de San José La Fuente, Distrito de Santa Rosa de Lima*/
            ['id' => 134, 'name' => 'Distrito de Anamorós', 'municipality_id' => 25, 'code' => 'DAN', 'created_at' => now()],
            ['id' => 135, 'name' => 'Distrito de Bolivar', 'municipality_id' => 25, 'code' => 'DBO', 'created_at' => now()],
            ['id' => 136, 'name' => 'Distrito de Concepción de Oriente', 'municipality_id' => 25, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 137, 'name' => 'Distrito de El Sauce', 'municipality_id' => 25, 'code' => 'DES', 'created_at' => now()],
            ['id' => 138, 'name' => 'Distrito de Lislique', 'municipality_id' => 25, 'code' => 'DLI', 'created_at' => now()],
            ['id' => 139, 'name' => 'Distrito de Nueva Esparta', 'municipality_id' => 25, 'code' => 'DNE', 'created_at' => now()],
            ['id' => 140, 'name' => 'Distrito de Pasaquina', 'municipality_id' => 25, 'code' => 'DPA', 'created_at' => now()],
            ['id' => 141, 'name' => 'Distrito de Polorós', 'municipality_id' => 25, 'code' => 'DPO', 'created_at' => now()],
            ['id' => 142, 'name' => 'Distrito de San José La Fuente', 'municipality_id' => 25, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 143, 'name' => 'Distrito de Santa Rosa de Lima', 'municipality_id' => 25, 'code' => 'DSR', 'created_at' => now()],

            /*Municipio de La Unión Sur: Distrito de Conchagua, Distrito de El Carmen, Distrito de lntipucá, Distrito de La Unión, Distrito de Meanguera del Golfo, Distrito de San Alejo, Distrito de Yayantique, Distrito de Yucuaiquín*/
            ['id' => 144, 'name' => 'Distrito de Conchagua', 'municipality_id' => 26, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 145, 'name' => 'Distrito de El Carmen', 'municipality_id' => 26, 'code' => 'DEC', 'created_at' => now()],
            ['id' => 146, 'name' => 'Distrito de lntipucá', 'municipality_id' => 26, 'code' => 'DIN', 'created_at' => now()],
            ['id' => 147, 'name' => 'Distrito de La Unión', 'municipality_id' => 26, 'code' => 'DLU', 'created_at' => now()],
            ['id' => 148, 'name' => 'Distrito de Meanguera del Golfo', 'municipality_id' => 26, 'code' => 'DME', 'created_at' => now()],
            ['id' => 149, 'name' => 'Distrito de San Alejo', 'municipality_id' => 26, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 150, 'name' => 'Distrito de Yayantique', 'municipality_id' => 26, 'code' => 'DYA', 'created_at' => now()],
            ['id' => 151, 'name' => 'Distrito de Yucuaiquín', 'municipality_id' => 26, 'code' => 'DYU', 'created_at' => now()],

            /*Municipio de Usulután Norte: Distrito de Santiago de María, Distrito de Alegría, Distrito de Berlín, Distrito de Mercedes Umana, Distrito de Jucuapa, Distrito de El Triunfo, Distrito de Estanzuelas, Distrito de San Buenaventura, Distrito de Nueva Granada*/
            ['id' => 152, 'name' => 'Distrito de Santiago de María', 'municipality_id' => 27, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 153, 'name' => 'Distrito de Alegría', 'municipality_id' => 27, 'code' => 'DAL', 'created_at' => now()],
            ['id' => 154, 'name' => 'Distrito de Berlín', 'municipality_id' => 27, 'code' => 'DBE', 'created_at' => now()],
            ['id' => 155, 'name' => 'Distrito de Mercedes Umana', 'municipality_id' => 27, 'code' => 'DMU', 'created_at' => now()],
            ['id' => 156, 'name' => 'Distrito de Jucuapa', 'municipality_id' => 27, 'code' => 'DJU', 'created_at' => now()],
            ['id' => 157, 'name' => 'Distrito de El Triunfo', 'municipality_id' => 27, 'code' => 'DTR', 'created_at' => now()],
            ['id' => 158, 'name' => 'Distrito de Estanzuelas', 'municipality_id' => 27, 'code' => 'DES', 'created_at' => now()],
            ['id' => 159, 'name' => 'Distrito de San Buenaventura', 'municipality_id' => 27, 'code' => 'DSB', 'created_at' => now()],
            ['id' => 160, 'name' => 'Distrito de Nueva Granada', 'municipality_id' => 27, 'code' => 'DNG', 'created_at' => now()],

            /*Municipio de Usulután Este: Distrito de Usulután, Distrito de Jucuarán, Distrito de San Dionisio, Distrito de Concepción Batres, Distrito de Santa María, Distrito de Ozatlán, Distrito de Tecapán, Distrito de Santa Elena, Distrito de California, Distrito de Ereguayquín*/
            ['id' => 161, 'name' => 'Distrito de Usulután', 'municipality_id' => 28, 'code' => 'DUS', 'created_at' => now()],
            ['id' => 162, 'name' => 'Distrito de Jucuarán', 'municipality_id' => 28, 'code' => 'DJU', 'created_at' => now()],
            ['id' => 163, 'name' => 'Distrito de San Dionisio', 'municipality_id' => 28, 'code' => 'DSD', 'created_at' => now()],
            ['id' => 164, 'name' => 'Distrito de Concepción Batres', 'municipality_id' => 28, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 165, 'name' => 'Distrito de Santa María', 'municipality_id' => 28, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 166, 'name' => 'Distrito de Ozatlán', 'municipality_id' => 28, 'code' => 'DOZ', 'created_at' => now()],
            ['id' => 167, 'name' => 'Distrito de Tecapán', 'municipality_id' => 28, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 168, 'name' => 'Distrito de Santa Elena', 'municipality_id' => 28, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 169, 'name' => 'Distrito de California', 'municipality_id' => 28, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 170, 'name' => 'Distrito de Ereguayquín', 'municipality_id' => 28, 'code' => 'DER', 'created_at' => now()],

            /*Municipio de Usulután Oeste: Distrito de Jiquilisco, Distrito de Puerto El Triunfo, Distrito de San Agustín, Distrito de San Francisco Javier*/
            ['id' => 171, 'name' => 'Distrito de Jiquilisco', 'municipality_id' => 29, 'code' => 'DJI', 'created_at' => now()],
            ['id' => 172, 'name' => 'Distrito de Puerto El Triunfo', 'municipality_id' => 29, 'code' => 'DPT', 'created_at' => now()],
            ['id' => 173, 'name' => 'Distrito de San Agustín', 'municipality_id' => 29, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 174, 'name' => 'Distrito de San Francisco Javier', 'municipality_id' => 29, 'code' => 'DSF', 'created_at' => now()],

            /*Municipio de Sonsonate Norte: Distrito de Juayúa, Distrito de Nahuizalco, Distrito de Salcoatitán, Distrito de Santa Catarina Masahuat*/
            ['id' => 175, 'name' => 'Distrito de Juayúa', 'municipality_id' => 30, 'code' => 'DJU', 'created_at' => now()],
            ['id' => 176, 'name' => 'Distrito de Nahuizalco', 'municipality_id' => 30, 'code' => 'DNA', 'created_at' => now()],
            ['id' => 177, 'name' => 'Distrito de Salcoatitán', 'municipality_id' => 30, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 178, 'name' => 'Distrito de Santa Catarina Masahuat', 'municipality_id' => 30, 'code' => 'DSC', 'created_at' => now()],

            /*Municipio de Sonsonate Centro: Distrito de Sonsonate, Distrito de Sonzacate, Distrito de Nahulingo, Distrito de San Antonio del Monte, Distrito de Santo Domingo de Guzmán*/
            ['id' => 179, 'name' => 'Distrito de Sonsonate', 'municipality_id' => 31, 'code' => 'DSS', 'created_at' => now()],
            ['id' => 180, 'name' => 'Distrito de Sonzacate', 'municipality_id' => 31, 'code' => 'DSO', 'created_at' => now()],
            ['id' => 181, 'name' => 'Distrito de Nahulingo', 'municipality_id' => 31, 'code' => 'DNA', 'created_at' => now()],
            ['id' => 182, 'name' => 'Distrito de San Antonio del Monte', 'municipality_id' => 31, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 183, 'name' => 'Distrito de Santo Domingo de Guzmán', 'municipality_id' => 31, 'code' => 'DSO', 'created_at' => now()],

            /*Municipio de Sonsonate Este: Distrito de lzalco, Distrito de Armenia, Distrito de Caluco, Distrito de San Julián, Distrito de Cuisnahuat, Distrito de Santa Isabel lshuatán*/
            ['id' => 184, 'name' => 'Distrito de lzalco', 'municipality_id' => 32, 'code' => 'DIZ', 'created_at' => now()],
            ['id' => 185, 'name' => 'Distrito de Armenia', 'municipality_id' => 32, 'code' => 'DAR', 'created_at' => now()],
            ['id' => 186, 'name' => 'Distrito de Caluco', 'municipality_id' => 32, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 187, 'name' => 'Distrito de San Julián', 'municipality_id' => 32, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 188, 'name' => 'Distrito de Cuisnahuat', 'municipality_id' => 32, 'code' => 'DCU', 'created_at' => now()],
            ['id' => 189, 'name' => 'Distrito de Santa Isabel lshuatán', 'municipality_id' => 32, 'code' => 'DSI', 'created_at' => now()],

            /*Municipio de Sonsonate Oeste: Distrito de Acajutla*/
            ['id' => 190, 'name' => 'Distrito de Acajutla', 'municipality_id' => 33, 'code' => 'DAC', 'created_at' => now()],

            /*Municipio de Santa Ana Norte: Distrito de Masahuat, Distrito de Metapán, Distrito de Santa Rosa Guachipilín, Distrito de Texistepeque*/
            ['id' => 191, 'name' => 'Distrito de Masahuat', 'municipality_id' => 34, 'code' => 'DMA', 'created_at' => now()],
            ['id' => 192, 'name' => 'Distrito de Metapán', 'municipality_id' => 34, 'code' => 'DME', 'created_at' => now()],
            ['id' => 193, 'name' => 'Distrito de Santa Rosa Guachipilín', 'municipality_id' => 34, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 194, 'name' => 'Distrito de Texistepeque', 'municipality_id' => 34, 'code' => 'DTE', 'created_at' => now()],

            /*Municipio de Santa Ana Centro: Distrito de Santa Ana*/
            ['id' => 195, 'name' => 'Distrito de Santa Ana', 'municipality_id' => 35, 'code' => 'DSA', 'created_at' => now()],

            /*Municipio de Santa Ana Este: Distrito de Coatepeque, Distrito de El Congo*/
            ['id' => 196, 'name' => 'Distrito de Coatepeque', 'municipality_id' => 36, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 197, 'name' => 'Distrito de El Congo', 'municipality_id' => 36, 'code' => 'DEC', 'created_at' => now()],

            /*Municipio de Santa Ana Oeste: Distrito de Candelaria de la Frontera, Distrito de Chalchuapa, Distrito de El Porvenir, Distrito de San Antonio Pajonal, Distrito de San Sebastián Salitrillo, Distrito de Santiago de La Frontera*/
            ['id' => 198, 'name' => 'Distrito de Candelaria de la Frontera', 'municipality_id' => 37, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 199, 'name' => 'Distrito de Chalchuapa', 'municipality_id' => 37, 'code' => 'DCH', 'created_at' => now()],
            ['id' => 200, 'name' => 'Distrito de El Porvenir', 'municipality_id' => 37, 'code' => 'DEP', 'created_at' => now()],
            ['id' => 201, 'name' => 'Distrito de San Antonio Pajonal', 'municipality_id' => 37, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 202, 'name' => 'Distrito de San Sebastián Salitrillo', 'municipality_id' => 37, 'code' => 'DSS', 'created_at' => now()],
            ['id' => 203, 'name' => 'Distrito de Santiago de La Frontera', 'municipality_id' => 37, 'code' => 'DSA', 'created_at' => now()],

            /*Municipio de San Vicente Norte: Distrito de Apastepeque, Distrito de Santa Clara, Distrito de San Ildefonso, Distrito de San Esteban Catarina, Distrito de San Sebastián, Distrito de San Lorenzo, Distrito de Santo Domingo*/
            ['id' => 204, 'name' => 'Distrito de Apastepeque', 'municipality_id' => 38, 'code' => 'DAP', 'created_at' => now()],
            ['id' => 205, 'name' => 'Distrito de Santa Clara', 'municipality_id' => 38, 'code' => 'DSC', 'created_at' => now()],
            ['id' => 206, 'name' => 'Distrito de San Ildefonso', 'municipality_id' => 38, 'code' => 'DSI', 'created_at' => now()],
            ['id' => 207, 'name' => 'Distrito de San Esteban Catarina', 'municipality_id' => 38, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 208, 'name' => 'Distrito de San Sebastián', 'municipality_id' => 38, 'code' => 'DSS', 'created_at' => now()],
            ['id' => 209, 'name' => 'Distrito de San Lorenzo', 'municipality_id' => 38, 'code' => 'DSL', 'created_at' => now()],
            ['id' => 210, 'name' => 'Distrito de Santo Domingo', 'municipality_id' => 38, 'code' => 'DSD', 'created_at' => now()],

            /*Municipio de San Vicente Sur: Distrito de San Vicente: Distrito de Guadalupe, Distrito de Verapaz, Distrito de Tepetitán, Distrito de Tecoluca, Distrito de San Cayetano lstepeque*/
            ['id' => 211, 'name' => 'Distrito de Guadalupe', 'municipality_id' => 39, 'code' => 'DGU', 'created_at' => now()],
            ['id' => 212, 'name' => 'Distrito de Guadalupe', 'municipality_id' => 39, 'code' => 'DGU', 'created_at' => now()],
            ['id' => 213, 'name' => 'Distrito de Verapaz', 'municipality_id' => 39, 'code' => 'DVE', 'created_at' => now()],
            ['id' => 214, 'name' => 'Distrito de Tepetitán', 'municipality_id' => 39, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 215, 'name' => 'Distrito de Tecoluca', 'municipality_id' => 39, 'code' => 'DTE', 'created_at' => now()],
            ['id' => 216, 'name' => 'Distrito de San Cayetano lstepeque', 'municipality_id' => 39, 'code' => 'DSC', 'created_at' => now()],

            /*Municipio de San Miguel Norte: Distrito de Ciudad Barrios, Distrito de Sesori, Distrito de Nuevo Edén de San Juan, Distrito de San Gerardo , Distrito de San Luis de La Reina, Distrito de Carolina, Distrito de San Antonio del Mosco, Distrito de Chapeltique*/
            ['id' => 217, 'name' => 'Distrito de Ciudad Barrios', 'municipality_id' => 40, 'code' => 'DCI', 'created_at' => now()],
            ['id' => 218, 'name' => 'Distrito de Sesori', 'municipality_id' => 40, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 219, 'name' => 'Distrito de Nuevo Edén de San Juan', 'municipality_id' => 40, 'code' => 'DNE', 'created_at' => now()],
            ['id' => 220, 'name' => 'Distrito de San Gerardo', 'municipality_id' => 40, 'code' => 'DSG', 'created_at' => now()],
            ['id' => 221, 'name' => 'Distrito de San Luis de La Reina', 'municipality_id' => 40, 'code' => 'DSL', 'created_at' => now()],
            ['id' => 222, 'name' => 'Distrito de Carolina', 'municipality_id' => 40, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 223, 'name' => 'Distrito de San Antonio del Mosco', 'municipality_id' => 40, 'code' => 'DSA', 'created_at' => now()],
            ['id' => 224, 'name' => 'Distrito de Chapeltique', 'municipality_id' => 40, 'code' => 'DCH', 'created_at' => now()],

            /*Municipio de San Miguel Centro: Distrito de San Miguel, Distrito de Comacarán, Distrito de Uluazapa, Distrito de Moncagua, Distrito de Quelepa, Distrito de Chirilagua*/
            ['id' => 225, 'name' => 'Distrito de San Miguel', 'municipality_id' => 41, 'code' => 'DSM', 'created_at' => now()],
            ['id' => 226, 'name' => 'Distrito de Comacarán', 'municipality_id' => 41, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 227, 'name' => 'Distrito de Uluazapa', 'municipality_id' => 41, 'code' => 'DUL', 'created_at' => now()],
            ['id' => 228, 'name' => 'Distrito de Moncagua', 'municipality_id' => 41, 'code' => 'DMO', 'created_at' => now()],
            ['id' => 229, 'name' => 'Distrito de Quelepa', 'municipality_id' => 41, 'code' => 'DQU', 'created_at' => now()],
            ['id' => 230, 'name' => 'Distrito de Chirilagua', 'municipality_id' => 41, 'code' => 'DCH', 'created_at' => now()],

            /*Municipio de San Miguel Oeste: Distrito de Chinameca, Distrito de Nueva Guadalupe, Distrito de Lolotique, Distrito de San Jorge, Distrito de San Rafael Oriente, Distrito de El Tránsito*/
            ['id' => 231, 'name' => 'Distrito de Chinameca', 'municipality_id' => 42, 'code' => 'DCH', 'created_at' => now()],
            ['id' => 232, 'name' => 'Distrito de Nueva Guadalupe', 'municipality_id' => 42, 'code' => 'DNG', 'created_at' => now()],
            ['id' => 233, 'name' => 'Distrito de Lolotique', 'municipality_id' => 42, 'code' => 'DLO', 'created_at' => now()],
            ['id' => 234, 'name' => 'Distrito de San Jorge', 'municipality_id' => 42, 'code' => 'DSJ', 'created_at' => now()],
            ['id' => 235, 'name' => 'Distrito de San Rafael Oriente', 'municipality_id' => 42, 'code' => 'DSR', 'created_at' => now()],
            ['id' => 236, 'name' => 'Distrito de El Tránsito', 'municipality_id' => 42, 'code' => 'DTR', 'created_at' => now()],

            /*Municipio de Morazán Norte: Distrito de Arambala, Distrito de Cacaopera, Distrito de Corinto, Distrito de El Rosario, Distrito de Joateca, Distrito de Jocoaitique, Distrito de Meanguera, Distrito de Perquín, Distrito de San Fernando, Distrito de San Isidro, Distrito de Torola*/
            ['id' => 237, 'name' => 'Distrito de Arambala', 'municipality_id' => 43, 'code' => 'DAR', 'created_at' => now()],
            ['id' => 238, 'name' => 'Distrito de Cacaopera', 'municipality_id' => 43, 'code' => 'DCA', 'created_at' => now()],
            ['id' => 239, 'name' => 'Distrito de Corinto', 'municipality_id' => 43, 'code' => 'DCO', 'created_at' => now()],
            ['id' => 240, 'name' => 'Distrito de El Rosario', 'municipality_id' => 43, 'code' => 'DER', 'created_at' => now()],
            ['id' => 241, 'name' => 'Distrito de Joateca', 'municipality_id' => 43, 'code' => 'DJO', 'created_at' => now()],
            ['id' => 242, 'name' => 'Distrito de Jocoaitique', 'municipality_id' => 43, 'code' => 'DJO', 'created_at' => now()],
            ['id' => 243, 'name' => 'Distrito de Meanguera', 'municipality_id' => 43, 'code' => 'DME', 'created_at' => now()],
            ['id' => 244, 'name' => 'Distrito de Perquín', 'municipality_id' => 43, 'code' => 'DPE', 'created_at' => now()],
            ['id' => 245, 'name' => 'Distrito de San Fernando', 'municipality_id' => 43, 'code' => 'DSF', 'created_at' => now()],
            ['id' => 246, 'name' => 'Distrito de San Isidro', 'municipality_id' => 43, 'code' => 'DSI', 'created_at' => now()],
            ['id' => 247, 'name' => 'Distrito de Torola', 'municipality_id' => 43, 'code' => 'DTO', 'created_at' => now()],

            /*Municipio de Morazán Sur: Distrito de Chilanga, Distrito de Delicias de Concepción, Distrito de El Divisadero, Distrito de Gualococti, Distrito de Guatajiagua, Distrito de Jocoro, Distrito de Lolotiquillo, Distrito de Osicala, Distrito de San Carlos, Distrito de San Francisco Gotera, Distrito de San Simón, Distrito de Sensembra, Distrito de Sociedad, Distrito de Yamabal, Distrito de Yoloaiquín*/
            ['id' => 248, 'name' => 'Distrito de Chilanga', 'municipality_id' => 44, 'code' => 'DCH', 'created_at' => now()],
            ['id' => 249, 'name' => 'Distrito de Delicias de Concepción', 'municipality_id' => 44, 'code' => 'DDE', 'created_at' => now()],
            ['id' => 250, 'name' => 'Distrito de El Divisadero', 'municipality_id' => 44, 'code' => 'DDE', 'created_at' => now()],
            ['id' => 251, 'name' => 'Distrito de Gualococti', 'municipality_id' => 44, 'code' => 'DGU', 'created_at' => now()],
            ['id' => 252, 'name' => 'Distrito de Guatajiagua', 'municipality_id' => 44, 'code' => 'DGU', 'created_at' => now()],
            ['id' => 253, 'name' => 'Distrito de Jocoro', 'municipality_id' => 44, 'code' => 'DJO', 'created_at' => now()],
            ['id' => 254, 'name' => 'Distrito de Lolotiquillo', 'municipality_id' => 44, 'code' => 'DLO', 'created_at' => now()],
            ['id' => 255, 'name' => 'Distrito de Osicala', 'municipality_id' => 44, 'code' => 'DOS', 'created_at' => now()],
            ['id' => 256, 'name' => 'Distrito de San Carlos', 'municipality_id' => 44, 'code' => 'DSC', 'created_at' => now()],
            ['id' => 257, 'name' => 'Distrito de San Francisco Gotera', 'municipality_id' => 44, 'code' => 'DSF', 'created_at' => now()],
            ['id' => 258, 'name' => 'Distrito de San Simón', 'municipality_id' => 44, 'code' => 'DSS', 'created_at' => now()],
            ['id' => 259, 'name' => 'Distrito de Sensembra', 'municipality_id' => 44, 'code' => 'DSE', 'created_at' => now()],
            ['id' => 260, 'name' => 'Distrito de Sociedad', 'municipality_id' => 44, 'code' => 'DSO', 'created_at' => now()],
            ['id' => 261, 'name' => 'Distrito de Yamabal', 'municipality_id' => 44, 'code' => 'DYA', 'created_at' => now()],
            ['id' => 262, 'name' => 'Distrito de Yoloaiquín', 'municipality_id' => 44, 'code' => 'DYO', 'created_at' => now()],
        ]);
    }
}
