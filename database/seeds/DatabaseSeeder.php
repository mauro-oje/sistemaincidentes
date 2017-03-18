<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(OficinaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IpSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(PlacaSeeder::class);
        $this->call(DiscoSeeder::class);
        $this->call(MemoriaSeeder::class);
        $this->call(FuenteSeeder::class);
        $this->call(ProcesadorSeeder::class);

        Model::reguard();
    }
}
