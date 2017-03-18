<?php

use Illuminate\Database\Seeder;
use App\PlacaMadre;

class PlacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'Rampage',
			'version'      =>'1.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'Rog Strix Z270g',
			'version'      =>'3.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'P8Z68-V LX',
			'version'      =>'1.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'P8Z68-V PRO',
			'version'      =>'1.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'P8Z68 DELUXE',
			'version'      =>'1.1',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asus',
			'modelo_placa' =>'P8Z68-V GEN3',
			'version'      =>'1.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asrock',
			'modelo_placa' =>'960gm-vgs3 fx',
			'version'      =>'1.1',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Asrock',
			'modelo_placa' =>'B75M-PLUS',
			'version'      =>'2.1',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Gigabyte',
			'modelo_placa' =>'h81m-h',
			'version'      =>'1.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Gigabyte',
			'modelo_placa' =>'P8H61-M',
			'version'      =>'1.3',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Gigabyte',
			'modelo_placa' =>'P8H67-M',
			'version'      =>'1.3',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'MSI',
			'modelo_placa' =>'970 gaming',
			'version'      =>'1.2',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Intel',
			'modelo_placa' =>'desktop board 01',
			'version'      =>'2.0',
			'disponible'   =>'si'
        ]);
         PlacaMadre::create([
			'marca_placa'  =>'Intel',
			'modelo_placa' =>'desktop 05',
			'version'      =>'2.0',
			'disponible'   =>'si'
        ]);
        PlacaMadre::create([
			'marca_placa'  =>'Intel',
			'modelo_placa' =>'IN897-47',
			'version'      =>'2.1',
			'disponible'   =>'si'
        ]);
    }
}
