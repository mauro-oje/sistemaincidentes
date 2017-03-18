<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Area::create([
            'nombre_area'=>'Mesa de entrada'
        ]);
        Area::create([
            'nombre_area'=>'Contable'
        ]);
        Area::create([
            'nombre_area'=>'Tierras fiscales'
        ]);
        Area::create([
			'nombre_area'=>'Privada'
        ]);
        Area::create([
            'nombre_area'=>'Sistemas'
        ]);
        Area::create([
            'nombre_area'=>'Gerencia'
        ]);
        Area::create([
            'nombre_area'=>'Ingenieria'
        ]);
        Area::create([
            'nombre_area'=>'Despacho'
        ]);
        Area::create([
            'nombre_area'=>'Ambiente'
        ]);
        Area::create([
            'nombre_area'=>'Jurídica'
        ]);
        /*
        Area::create([
            'nombre_area'=>'Deposito'
        ]);
        */
    }
}
