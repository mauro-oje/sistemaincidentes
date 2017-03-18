<?php

use Illuminate\Database\Seeder;
use App\DiscoDuro;

class DiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Seagate',
			'modelo_disco'    =>'Barracuda',
			'capacidad_disco' =>'500 GB',
			'interface'       =>'SATA II',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Seagate',
			'modelo_disco'    =>'Barracuda',
			'capacidad_disco' =>'1 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Western Digital',
			'modelo_disco'    =>'Caviar BLue',
			'capacidad_disco' =>'500 GB',
			'interface'       =>'SATA II',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Western Digital',
			'modelo_disco'    =>'Caviar BLue',
			'capacidad_disco' =>'1 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Western Digital',
			'modelo_disco'    =>'Green BLue',
			'capacidad_disco' =>'1 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Toshiba',
			'modelo_disco'    =>'Canvio',
			'capacidad_disco' =>'500 GB',
			'interface'       =>'SATA II',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'OCZ',
			'modelo_disco'    =>'Agility 3',
			'capacidad_disco' =>'1 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Samsung',
			'modelo_disco'    =>'850 evo',
			'capacidad_disco' =>'240 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Kingston',
			'modelo_disco'    =>'Uv400',
			'capacidad_disco' =>'240 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Kingston',
			'modelo_disco'    =>'Hyperx Savage',
			'capacidad_disco' =>'160 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Adata',
			'modelo_disco'    =>'Silent Anti Shock',
			'capacidad_disco' =>'480 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Sandisk',
			'modelo_disco'    =>'Sandisk Plus',
			'capacidad_disco' =>'120 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'SSD',
			'marca_disco'     =>'Corsair',
			'modelo_disco'    =>'Force Le',
			'capacidad_disco' =>'240 GB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Western Digital',
			'modelo_disco'    =>'Nas Red',
			'capacidad_disco' =>'2 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
        DiscoDuro::create([
			'tipo_disco'      =>'HHD',
			'marca_disco'     =>'Western Digital',
			'modelo_disco'    =>'Purple Dvr Seguridad',
			'capacidad_disco' =>'3 TB',
			'interface'       =>'SATA III',
			'disponible'      =>'si'
        ]);
    }
}
