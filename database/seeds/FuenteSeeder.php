<?php

use Illuminate\Database\Seeder;
use App\Fuente;

class FuenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fuente::create([
			'marca_fuente'     =>'Corsair',
			'modelo_fuente'    =>'CX600',
			'capacidad_fuente' =>'600W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Corsair',
			'modelo_fuente'    =>'CX750M',
			'capacidad_fuente' =>'750W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Nzxt',
			'modelo_fuente'    =>'Hale 82 V2 Modular',
			'capacidad_fuente' =>'550W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'SAMURAI',
			'capacidad_fuente' =>'800W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'SAMURAI',
			'capacidad_fuente' =>'500W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'SAMURAI',
			'capacidad_fuente' =>'550W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'ATX-Generica',
			'capacidad_fuente' =>'500W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Noganet',
			'modelo_fuente'    =>'ATX-Generica',
			'capacidad_fuente' =>'500W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'ATX-Generica',
			'capacidad_fuente' =>'800W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Sentey',
			'modelo_fuente'    =>'BXP65-OR',
			'capacidad_fuente' =>'650W',
			'disponible'       =>'si'
        ]);
         Fuente::create([
			'marca_fuente'     =>'Sentey',
			'modelo_fuente'    =>'Snp650-hs',
			'capacidad_fuente' =>'650W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Sentey',
			'modelo_fuente'    =>'BCP600',
			'capacidad_fuente' =>'600W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Thermaltake',
			'modelo_fuente'    =>'TR2',
			'capacidad_fuente' =>'700W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Thermaltake',
			'modelo_fuente'    =>'Smart 750',
			'capacidad_fuente' =>'750W',
			'disponible'       =>'si'
        ]);
        Fuente::create([
			'marca_fuente'     =>'Kanji',
			'modelo_fuente'    =>'ATX-Generica',
			'capacidad_fuente' =>'500W',
			'disponible'       =>'si'
        ]);
    }
}
