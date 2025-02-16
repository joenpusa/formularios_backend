<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    public function run()
    {
        $municipios = [
            ['id' => 1, 'nombre' => 'ABREGO'],
            ['id' => 2, 'nombre' => 'ARBOLEDAS'],
            ['id' => 3, 'nombre' => 'BOCHALEMA'],
            ['id' => 4, 'nombre' => 'BUCARASICA'],
            ['id' => 5, 'nombre' => 'CACHIRÁ'],
            ['id' => 6, 'nombre' => 'CÁCOTA'],
            ['id' => 7, 'nombre' => 'CHINÁCOTA'],
            ['id' => 8, 'nombre' => 'CHITAGÁ'],
            ['id' => 9, 'nombre' => 'CONVENCIÓN'],
            ['id' => 10, 'nombre' => 'CUCUTILLA'],
            ['id' => 11, 'nombre' => 'DURANIA'],
            ['id' => 12, 'nombre' => 'EL CARMEN'],
            ['id' => 13, 'nombre' => 'EL TARRA'],
            ['id' => 14, 'nombre' => 'EL ZULIA'],
            ['id' => 15, 'nombre' => 'GRAMALOTE'],
            ['id' => 16, 'nombre' => 'HACARÍ'],
            ['id' => 17, 'nombre' => 'HERRÁN'],
            ['id' => 18, 'nombre' => 'LA ESPERANZA'],
            ['id' => 19, 'nombre' => 'LA PLAYA'],
            ['id' => 20, 'nombre' => 'LABATECA'],
            ['id' => 21, 'nombre' => 'LOS PATIOS'],
            ['id' => 22, 'nombre' => 'LOURDES'],
            ['id' => 23, 'nombre' => 'MUTISCUA'],
            ['id' => 24, 'nombre' => 'OCAÑA'],
            ['id' => 25, 'nombre' => 'PAMPLONA'],
            ['id' => 26, 'nombre' => 'PAMPLONITA'],
            ['id' => 27, 'nombre' => 'PUERTO SANTANDER'],
            ['id' => 28, 'nombre' => 'RAGONVALIA'],
            ['id' => 29, 'nombre' => 'SALAZAR'],
            ['id' => 30, 'nombre' => 'SAN CALIXTO'],
            ['id' => 31, 'nombre' => 'SAN CAYETANO'],
            ['id' => 32, 'nombre' => 'SANTIAGO'],
            ['id' => 33, 'nombre' => 'SARDINATA'],
            ['id' => 34, 'nombre' => 'SILOS'],
            ['id' => 35, 'nombre' => 'TEORAMA'],
            ['id' => 36, 'nombre' => 'TIBÚ'],
            ['id' => 37, 'nombre' => 'TOLEDO'],
            ['id' => 38, 'nombre' => 'VILLA CARO'],
            ['id' => 39, 'nombre' => 'VILLA DEL ROSARIO'],
        ];

        DB::table('municipios')->insert($municipios);
    }
}
