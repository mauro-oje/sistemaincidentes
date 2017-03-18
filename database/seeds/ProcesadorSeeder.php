<?php

use Illuminate\Database\Seeder;
use App\Procesador;

class ProcesadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Celeron D',
			'capacidad_procesador' =>'1.8 Ghz',
			'core_procesador'      =>'2',
			'socket_procesador'    =>'LGA 775',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Pentium',
			'capacidad_procesador' =>'3.0 Ghz',
			'core_procesador'      =>'2',
			'socket_procesador'    =>'LGA 775',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Corei i3',
			'capacidad_procesador' =>'2.8 Ghz',
			'core_procesador'      =>'2',
			'socket_procesador'    =>'LGA 2011',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Corei i5',
			'capacidad_procesador' =>'2.4 Ghz',
			'core_procesador'      =>'2',
			'socket_procesador'    =>'LGA 1151',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Corei i7',
			'capacidad_procesador' =>'2.2 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'LGA 1150 & 1155',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'Intel',
			'modelo_procesador'    =>'Corei i7 7700k',
			'capacidad_procesador' =>'4.2 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'LGA 1151',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Atlon X2',
			'capacidad_procesador' =>'2 Ghz',
			'core_procesador'      =>'2',
			'socket_procesador'    =>'AMD2',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Atlon X4',
			'capacidad_procesador' =>'2.6 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'AMD2+',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Phenom X4',
			'capacidad_procesador' =>'2.2 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'AMD3',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Phenom X6 Black Edition',
			'capacidad_procesador' =>'3.4 Ghz',
			'core_procesador'      =>'6',
			'socket_procesador'    =>'AMD3',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Vishera Fx X8 8350',
			'capacidad_procesador' =>'4.0 Ghz',
			'core_procesador'      =>'8',
			'socket_procesador'    =>'AMD3+',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Bulldozer Fx 6300',
			'capacidad_procesador' =>'3.5 Ghz',
			'core_procesador'      =>'8',
			'socket_procesador'    =>'AMD3+',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'A10 7860k',
			'capacidad_procesador' =>'3.5 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'AMD3+',
			'disponible'           =>'si'
        ]);
        Procesador::create([
			'marca_procesador'     =>'AMD',
			'modelo_procesador'    =>'Fx 8350',
			'capacidad_procesador' =>'4.0 Ghz',
			'core_procesador'      =>'4',
			'socket_procesador'    =>'AMD3+',
			'disponible'           =>'si'
        ]);
    }
}
