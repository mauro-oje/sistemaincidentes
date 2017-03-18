<?php

use Illuminate\Database\Seeder;
use App\MemoriaRam;

class MemoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR2',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'1 GB',
			'frecuencia'        =>'667MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR2',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'1 GB',
			'frecuencia'        =>'667MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'2 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Novatech',
			'capacidad_memoria' =>'2 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Novatech',
			'capacidad_memoria' =>'2 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'4 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'8 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
     	MemoriaRam::create([
			'tipo_memoria'      =>'DDR2',
			'marca_memoria'     =>'AVANT Titan Memory',
			'capacidad_memoria' =>'1 GB',
			'frecuencia'        =>'667MHz',
			'disponible'        =>'si'
        ]);
		MemoriaRam::create([
			'tipo_memoria'      =>'DDR2',
			'marca_memoria'     =>'AVANT Titan Memory',
			'capacidad_memoria' =>'2 GB',
			'frecuencia'        =>'667MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Kingston',
			'capacidad_memoria' =>'2 GB',
			'frecuencia'        =>'800MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Gskill',
			'capacidad_memoria' =>'4 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
		MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'Gskill',
			'capacidad_memoria' =>'4 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'OCZ',
			'capacidad_memoria' =>'4 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
        MemoriaRam::create([
			'tipo_memoria'      =>'DDR3',
			'marca_memoria'     =>'OCZ',
			'capacidad_memoria' =>'8 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);
		MemoriaRam::create([
			'tipo_memoria'      =>'DDR4',
			'marca_memoria'     =>'Corsair',
			'capacidad_memoria' =>'8 GB',
			'frecuencia'        =>'1333MHz',
			'disponible'        =>'si'
        ]);

    }
}
