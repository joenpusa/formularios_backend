<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddMissingMunicipiosSeeder extends Seeder
{
    public function run()
    {
        DB::table('municipios')->insertOrIgnore([
            ['id' => 40, 'nombre' => 'CÚCUTA'],
        ]);
    }
}
