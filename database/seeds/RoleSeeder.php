<?php

use Illuminate\Database\Seeder;

//use App\Role;
use Bican\Roles\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	
        $adminRole = Role::create([
			'name' => 'Admin',
			'slug' => 'admin',
			'description' => 'Administrador de Sistema', // optional
			'level' => 1, // optional, set to 1 by default
		]);

		$tecnicoRole = Role::create([
			'name' => 'tecnicoHS',
			'slug' => 'tecnicohs',
			'description' => 'Técnico Hardware/Softeare', // optional
			'level' => 2, // optional, set to 1 by default
		]);

		$tecnicoRole = Role::create([
			'name' => 'tecnicoRI',
			'slug' => 'tecnicori',
			'description' => 'Técnico Red/Internet', // optional
			'level' => 3, // optional, set to 1 by default
		]);

		$miembroRole = Role::create([
			'name' => 'Miembro',
			'slug' => 'miembro',
			'description' => 'Miembro', // optional
			'level' => 4, // optional, set to 1 by default
		]);
		
    }
}
