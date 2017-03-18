<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        /*
        User::create([
			'username'   =>'bgate',
			'tipo'       =>'admin',
			'name'       =>'Bill',
			'apellido'   =>'Gate',
			'email'      =>'bgate@abc.com',
			'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        */
        User::create([
            'username'   =>'smarino',
            'tipo'       =>'admin',
            'name'       =>'Sonia',
            'apellido'   =>'Mariño',
            'email'      =>'simarinio@yahoo.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'mgodoy',
            'tipo'       =>'admin',
            'name'       =>'María',
            'apellido'   =>'Godoy',
            'email'      =>'mgodoy@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'yrodriguez',
            'tipo'       =>'admin',
            'name'       =>'Yolanda',
            'apellido'   =>'Rodriguez',
            'email'      =>'yrodriguez@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'mojeda',
            'tipo'       =>'tecnicoHS',
            'name'       =>'Mauro',
            'apellido'   =>'Ojeda',
            'email'      =>'mojeda@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'apfortunato',
            'tipo'       =>'tecnicoRI',
            'name'       =>'Augusto',
            'apellido'   =>'Perez Fortunato',
            'email'      =>'apfortunato@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'wpinto',
            'tipo'       =>'tecnicoRI',
            'name'       =>'Walter',
            'apellido'   =>'Pinto',
            'email'      =>'wpinto@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);
        User::create([
            'username'   =>'jcmorales',
            'tipo'       =>'tecnicoHS',
            'name'       =>'Juan Carlos',
            'apellido'   =>'Morales',
            'email'      =>'jcmorales@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>12
        ]);

        User::create([
            'username'   =>'mperucca',
            'tipo'       =>'miembro',
            'name'       =>'Marcos',
            'apellido'   =>'Perucca',
            'email'      =>'mperucca@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>1
        ]);
        User::create([
            'username'   =>'nzaracho',
            'tipo'       =>'miembro',
            'name'       =>'Nicolas',
            'apellido'   =>'Zaracho',
            'email'      =>'nzaracho@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>1
        ]);
        User::create([
            'username'   =>'nsoto',
            'tipo'       =>'miembro',
            'name'       =>'Nahuel',
            'apellido'   =>'Soto',
            'email'      =>'nsoto@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>1
        ]);
        User::create([
            'username'   =>'vdelgadillo',
            'tipo'       =>'miembro',
            'name'       =>'Vilma',
            'apellido'   =>'Delgadillo',
            'email'      =>'vdelgadillo@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>2
        ]);
        User::create([
            'username'   =>'adominguez',
            'tipo'       =>'miembro',
            'name'       =>'Alexis',
            'apellido'   =>'Dominguez',
            'email'      =>'adominguez@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>2
        ]);
        User::create([
            'username'   =>'balarcon',
            'tipo'       =>'miembro',
            'name'       =>'Belen',
            'apellido'   =>'Alarcon',
            'email'      =>'balarcon@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>2
        ]);

        User::create([
            'username'   =>'jmcedrolla',
            'tipo'       =>'miembro',
            'name'       =>'Juan Manuel',
            'apellido'   =>'Cedrolla',
            'email'      =>'jmcedrolla@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>3
        ]);
        User::create([
            'username'   =>'rarce',
            'tipo'       =>'miembro',
            'name'       =>'Romina',
            'apellido'   =>'Arce',
            'email'      =>'rarce@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>3
        ]);
        User::create([
            'username'   =>'ngauna',
            'tipo'       =>'miembro',
            'name'       =>'Natalia',
            'apellido'   =>'Gauna',
            'email'      =>'ngauna@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>4
        ]);
        User::create([
            'username'   =>'amartin',
            'tipo'       =>'miembro',
            'name'       =>'Alejadnra',
            'apellido'   =>'Martin',
            'email'      =>'amartin@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>4
        ]);
        User::create([
            'username'   =>'jdelbuono',
            'tipo'       =>'miembro',
            'name'       =>'Jorge',
            'apellido'   =>'Del Buono',
            'email'      =>'jdelbuono@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>4
        ]);
       
       User::create([
            'username'   =>'abobadilla',
            'tipo'       =>'miembro',
            'name'       =>'Atilio',
            'apellido'   =>'Bobadilla',
            'email'      =>'abobadilla@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>5
        ]);
        User::create([
            'username'   =>'mvignolo',
            'tipo'       =>'miembro',
            'name'       =>'Maria',
            'apellido'   =>'Vignolo',
            'email'      =>'mvignolo@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>5
        ]);
        User::create([
            'username'   =>'mortega',
            'tipo'       =>'miembro',
            'name'       =>'Marta',
            'apellido'   =>'Ortega',
            'email'      =>'mortega@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>6
        ]);
        User::create([
            'username'   =>'fmedrano',
            'tipo'       =>'miembro',
            'name'       =>'Facundo',
            'apellido'   =>'Medrano',
            'email'      =>'fmedrano@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>6
        ]);
        User::create([
            'username'   =>'mpinto',
            'tipo'       =>'miembro',
            'name'       =>'Miguel',
            'apellido'   =>'Pinto',
            'email'      =>'mpinto@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>7
        ]);
        User::create([
            'username'   =>'jccedrolla',
            'tipo'       =>'miembro',
            'name'       =>'Juan Carlos',
            'apellido'   =>'Cedrolla',
            'email'      =>'jccedrolla@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>7
        ]);

        User::create([
            'username'   =>'lcaseres',
            'tipo'       =>'miembro',
            'name'       =>'Lorena',
            'apellido'   =>'Caseres',
            'email'      =>'lcaseres@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>8
        ]);
        User::create([
            'username'   =>'pdamion',
            'tipo'       =>'miembro',
            'name'       =>'Pablo',
            'apellido'   =>'Damion',
            'email'      =>'pdamion@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>8
        ]);
        User::create([
            'username'   =>'resteche',
            'tipo'       =>'miembro',
            'name'       =>'Roxana',
            'apellido'   =>'Esteche',
            'email'      =>'resteche@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>8
        ]);
        User::create([
            'username'   =>'ntraviñio',
            'tipo'       =>'miembro',
            'name'       =>'Nicolas',
            'apellido'   =>'Traviño',
            'email'      =>'ntraviñio@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>9
        ]);
        User::create([
            'username'   =>'alopez',
            'tipo'       =>'miembro',
            'name'       =>'Alejandro',
            'apellido'   =>'Lopez',
            'email'      =>'rlopez@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>9
        ]);
        User::create([
            'username'   =>'tpill',
            'tipo'       =>'miembro',
            'name'       =>'Teresa',
            'apellido'   =>'Pill',
            'email'      =>'tpill@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>9
        ]);
        User::create([
            'username'   =>'rcandia',
            'tipo'       =>'miembro',
            'name'       =>'Roberto',
            'apellido'   =>'Candia',
            'email'      =>'rcandia@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>9
        ]);
        User::create([
            'username'   =>'ooftman',
            'tipo'       =>'miembro',
            'name'       =>'Roberto',
            'apellido'   =>'Candia',
            'email'      =>'ooftman@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>10
        ]);
        User::create([
            'username'   =>'jacosta',
            'tipo'       =>'miembro',
            'name'       =>'Julio',
            'apellido'   =>'Acosta',
            'email'      =>'jacosta@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>11
        ]);

        User::create([
            'username'   =>'pgaitan',
            'tipo'       =>'miembro',
            'name'       =>'Pedro',
            'apellido'   =>'Gaitan',
            'email'      =>'pgaitan@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>13
        ]);
        User::create([
            'username'   =>'jagnello',
            'tipo'       =>'miembro',
            'name'       =>'Juan',
            'apellido'   =>'Agnello',
            'email'      =>'jagnello@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>13
        ]);
        User::create([
            'username'   =>'mgalarza',
            'tipo'       =>'miembro',
            'name'       =>'Maximiliano',
            'apellido'   =>'Galarza',
            'email'      =>'mgalarza@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>14
        ]);
        User::create([
            'username'   =>'aortiz',
            'tipo'       =>'miembro',
            'name'       =>'Anibal',
            'apellido'   =>'Ortiz',
            'email'      =>'aortiz@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>14
        ]);
        User::create([
            'username'   =>'npianalto',
            'tipo'       =>'miembro',
            'name'       =>'Natalia',
            'apellido'   =>'Pianalto',
            'email'      =>'npianalto@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>15
        ]);
        User::create([
            'username'   =>'odominguez',
            'tipo'       =>'miembro',
            'name'       =>'Omar',
            'apellido'   =>'Dominguez',
            'email'      =>'odominguez@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>15
        ]);
        User::create([
            'username'   =>'ablanco',
            'tipo'       =>'miembro',
            'name'       =>'Alicia',
            'apellido'   =>'Blanco',
            'email'      =>'ablanco@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>15
        ]);

        User::create([
            'username'   =>'bsilvero',
            'tipo'       =>'miembro',
            'name'       =>'Blanca',
            'apellido'   =>'Silvero',
            'email'      =>'bsilvero@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>16
        ]);
        User::create([
            'username'   =>'vecheverria',
            'tipo'       =>'miembro',
            'name'       =>'Victoria',
            'apellido'   =>'Echeverria',
            'email'      =>'vecheverria@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>16
        ]);
        User::create([
            'username'   =>'abillordo',
            'tipo'       =>'miembro',
            'name'       =>'Agustina',
            'apellido'   =>'Billordo',
            'email'      =>'abillordo@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>17
        ]);
        User::create([
            'username'   =>'ebarrios',
            'tipo'       =>'miembro',
            'name'       =>'Eugenia',
            'apellido'   =>'Barrios',
            'email'      =>'ebarrios@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>17
        ]);
        User::create([
            'username'   =>'fescalantes',
            'tipo'       =>'miembro',
            'name'       =>'Fernando',
            'apellido'   =>'Escalantes',
            'email'      =>'fescalantes@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>17
        ]);
        User::create([
            'username'   =>'lzacarias',
            'tipo'       =>'miembro',
            'name'       =>'Luisa',
            'apellido'   =>'Zacarias',
            'email'      =>'lzacarias@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>18
        ]);
        User::create([
            'username'   =>'gfulano',
            'tipo'       =>'miembro',
            'name'       =>'Godoy',
            'apellido'   =>'Fulano',
            'email'      =>'gfulano@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>18
        ]);
        User::create([
            'username'   =>'mpiñeiro',
            'tipo'       =>'miembro',
            'name'       =>'Mabel',
            'apellido'   =>'Piñeiro',
            'email'      =>'mpiñeiro@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>19
        ]);
        User::create([
            'username'   =>'opfortunato',
            'tipo'       =>'miembro',
            'name'       =>'Omar',
            'apellido'   =>'Perez Fortunato',
            'email'      =>'opfortunato@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>19
        ]);
        User::create([
            'username'   =>'apanseri',
            'tipo'       =>'miembro',
            'name'       =>'Andrea',
            'apellido'   =>'Panseri',
            'email'      =>'apanseri@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>21
        ]);
        User::create([
            'username'   =>'mpescatore',
            'tipo'       =>'miembro',
            'name'       =>'Miguel',
            'apellido'   =>'Pescatore',
            'email'      =>'mpescatore@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>22
        ]);
        User::create([
            'username'   =>'eresuche',
            'tipo'       =>'miembro',
            'name'       =>'Esteban',
            'apellido'   =>'Resuche',
            'email'      =>'eresuche@abc.com',
            'password'   =>bcrypt('123'),
            'oficina_id' =>22
        ]);
    }
}
