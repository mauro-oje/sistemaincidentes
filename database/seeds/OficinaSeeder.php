<?php

use Illuminate\Database\Seeder;
use App\Oficina;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        Oficina::create([
        	// id => 1
			'oficina' =>'Oficina 1',
			'area_id' =>1 //Mesa de entrada
        ]);
        Oficina::create([
        	// id => 2
			'oficina' =>'Oficina 2',
			'area_id' =>1 //Mesa de entrada
        ]);
        Oficina::create([
        	// id => 3
			'oficina' =>'Oficina 3',
			'area_id' =>2 //Contable
        ]);
        Oficina::create([
        	// id => 4
			'oficina' =>'Oficina 4',
			'area_id' =>2 //Contable
		]);
        Oficina::create([
        	// id => 5
			'oficina' =>'Oficina 5',
			'area_id' =>3 //Tierras fiscales
        ]);
        Oficina::create([
        	// id => 6
			'oficina' =>'Oficina 6',
			'area_id' =>3 //Tierras fiscales
        ]);
        Oficina::create([
        	// id => 7
			'oficina' =>'Oficina 7',
			'area_id' =>3 //Tierras fiscales
        ]);
        Oficina::create([
        	// id => 8
			'oficina' =>'Oficina 8',
			'area_id' =>4 //Privada
        ]);
        Oficina::create([
        	// id => 9
			'oficina' =>'Oficina 9',
			'area_id' =>4 //Privada 
        ]);
        Oficina::create([
        	// id => 10
			'oficina' =>'Oficina 10',
			'area_id' =>6 //Gerencia
        ]);
        Oficina::create([
        	// id => 11
			'oficina' =>'Oficina 11',
			'area_id' =>6 //Gerencia
        ]);
        Oficina::create([
        	// id => 12
			'oficina' =>'Oficina 12',
			'area_id' =>5 //Sistemas 
        ]);
        Oficina::create([
        	// id => 13
			'oficina' =>'Oficina 13',
			'area_id' =>7 //Ingenieria
        ]);
        Oficina::create([
        	// id => 14
			'oficina' =>'Oficina 14',
			'area_id' =>7 //Ingenieria
        ]);
        Oficina::create([
        	// id => 15
			'oficina' =>'Oficina 15',
			'area_id' =>7 //Ingenieria
        ]);
        Oficina::create([
        	// id => 16
			'oficina' =>'Oficina 16',
			'area_id' =>8 //Despacho
        ]);
        Oficina::create([
        	// id => 17
			'oficina' =>'Oficina 17',
			'area_id' =>8 //Despacho
        ]);
        Oficina::create([
        	// id => 18
			'oficina' =>'Oficina 18',
			'area_id' =>9 //Ambiente
        ]);
        Oficina::create([
        	// id => 19
			'oficina' =>'Oficina 19',
			'area_id' =>9 //Ambiente
        ]);
        Oficina::create([
        	// id => 20
			'oficina' =>'Oficina 20',
			'area_id' =>9 //Ambiente
        ]);
        Oficina::create([
        	// id => 21
			'oficina' =>'Oficina 21',
			'area_id' =>10 //Juridica
        ]);
        Oficina::create([
        	// id => 22
			'oficina' =>'Oficina 22',
			'area_id' =>10 //Juridica
        ]);
    }
}
