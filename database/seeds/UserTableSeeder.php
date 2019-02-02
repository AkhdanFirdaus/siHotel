<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('nama', 'Admin')->first();                
        $receptionist = Role::where('nama', 'Resepsionis')->first();
        $manajer = Role::where('nama', 'Manajer')->first();

        $adm = new User();
        $adm->name = 'Akhdan Musyaffa Firdaus';
        $adm->email = 'akhdan.firdaus@hotmail.com';
        $adm->password = bcrypt('akhdanfirdaus');
        $adm->save();
        $adm->roles()->attach($admin);                

        $resepsionis = new User();
        $resepsionis->name = 'Tarisa Refiana';
        $resepsionis->email = 'tarisa.rfna@email.com';
        $resepsionis->password = bcrypt('tarisarfna');
        $resepsionis->save();
        $resepsionis->roles()->attach($receptionist);

        $manager = new User();
        $manager->name = 'Falih Naufal';
        $manager->email = 'falih.naufal@email.com';
        $manager->password = bcrypt('falihnaufal');
        $manager->save();
        $manager->roles()->attach($manajer);
    }
}
