<?php

use Illuminate\Database\Seeder;
use App\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        //$user = User::all();

        $userAdmin = User::find(1); //Bill
		$userAdmin->attachRole(1);
        
		$userTecnicoHS1 = User::find(2); //Mauro
		$userTecnicoHS1->attachRole(2);

        $userTecnicoRI1= User::find(3); //Augusto
        $userTecnicoRI1->attachRole(3);

		$userTecnicoRI2 = User::find(4); //Walter
		$userTecnicoRI2->attachRole(3);

        $userTecnicoHS2 = User::find(5); //Juan Carlos
        $userTecnicoHS2->attachRole(2);

		$userMiembro = User::find(6); //Marcos
		$userMiembro->attachRole(4);

        $userMiembro2 = User::find(7); //Nico
        $userMiembro2->attachRole(4);

        $userMiembro3 = User::find(8); //Nahuel
        $userMiembro3->attachRole(4);

        $userMiembro4 = User::find(9);
        $userMiembro4->attachRole(4);

        $userMiembro5 = User::find(10);
        $userMiembro5->attachRole(4);

        $userMiembro6 = User::find(11);
        $userMiembro6->attachRole(4);

        $userMiembro7 = User::find(12);
        $userMiembro7->attachRole(4);

        $userMiembro8 = User::find(13);
        $userMiembro8->attachRole(4);

        $userMiembro9 = User::find(14);
        $userMiembro9->attachRole(4);

        $userMiembro10 = User::find(15);
        $userMiembro10->attachRole(4);

        $userMiembro11 = User::find(16);
        $userMiembro11->attachRole(4);

        $userMiembro12 = User::find(17);
        $userMiembro12->attachRole(4);

        $userMiembro13 = User::find(18);
        $userMiembro13->attachRole(4);

        $userMiembro14 = User::find(19);
        $userMiembro14->attachRole(4);

        $userMiembro15 = User::find(20);
        $userMiembro15->attachRole(4);

        $userMiembro16 = User::find(21);
        $userMiembro16->attachRole(4);

        $userMiembro17 = User::find(22);
        $userMiembro17->attachRole(4);

        $userMiembro18 = User::find(23);
        $userMiembro18->attachRole(4);

        $userMiembro19 = User::find(24);
        $userMiembro19->attachRole(4);

        $userMiembro20 = User::find(25);
        $userMiembro20->attachRole(4);

        $userMiembro21 = User::find(26);
        $userMiembro21->attachRole(4);

        $userMiembro22 = User::find(27);
        $userMiembro22->attachRole(4);

        $userMiembro23 = User::find(28);
        $userMiembro23->attachRole(4);

        $userMiembro24 = User::find(29);
        $userMiembro24->attachRole(4);

        $userMiembro25 = User::find(30);
        $userMiembro25->attachRole(4);

        $userMiembro26 = User::find(31);
        $userMiembro26->attachRole(4);

        $userMiembro27 = User::find(32);
        $userMiembro27->attachRole(4);

        $userMiembro28 = User::find(33);
        $userMiembro28->attachRole(4);

        $userMiembro29 = User::find(34);
        $userMiembro29->attachRole(4);

        $userMiembro30 = User::find(35);
        $userMiembro30->attachRole(4);

        $userMiembro31 = User::find(35);
        $userMiembro31->attachRole(4);

        $userMiembro32 = User::find(36);
        $userMiembro32->attachRole(4);

        $userMiembro33 = User::find(37);
        $userMiembro33->attachRole(4);

        $userMiembro34 = User::find(38);
        $userMiembro34->attachRole(4);

        $userMiembro35 = User::find(39);
        $userMiembro35->attachRole(4);

        $userMiembro36 = User::find(40);
        $userMiembro36->attachRole(4);

        $userMiembro37 = User::find(41);
        $userMiembro37->attachRole(4);

        $userMiembro38 = User::find(42);
        $userMiembro38->attachRole(4);

        $userMiembro39 = User::find(43);
        $userMiembro39->attachRole(4);

        $userMiembro40 = User::find(44);
        $userMiembro40->attachRole(4);

        $userMiembro41 = User::find(45);
        $userMiembro41->attachRole(4);

        $userMiembro42 = User::find(46);
        $userMiembro42->attachRole(4);

        $userMiembro43 = User::find(47);
        $userMiembro43->attachRole(4);

        $userMiembro44 = User::find(48);
        $userMiembro44->attachRole(4);

        $userMiembro45 = User::find(49);
        $userMiembro45->attachRole(4);

        $userMiembro46 = User::find(50);
        $userMiembro46->attachRole(4);
        
    }
}
