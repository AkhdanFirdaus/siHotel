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
        $role_manager = Role::where('nama', 'Manajer')->first();        
        $role_headReceptionist = Role::where('nama', 'Kepala Resepsionis')->first();
        $receptionist = Role::where('nama', 'Resepsionis')->first();

        $manager = new User();
        $manager->name = 'Akhdan Musyaffa Firdaus';
        $manager->email = 'akhdan.firdaus@hotmail.com';
        $manager->password = bcrypt('akhdanfirdaus');
        $manager->save();
        $manager->roles()->attach($role_manager);        

        $headReceptionist = new User();
        $headReceptionist->name = 'Falih Naufal';
        $headReceptionist->email = 'falih.naufal@email.com';
        $headReceptionist->password = bcrypt('falihnaufal');
        $headReceptionist->save();
        $headReceptionist->roles()->attach($role_headReceptionist);

        $reserveSuper = new User();
        $reserveSuper->name = 'Tarisa Refiana';
        $reserveSuper->email = 'tarisa.rfna@email.com';
        $reserveSuper->password = bcrypt('tarisarfna');
        $reserveSuper->save();
        $reserveSuper->roles()->attach($receptionist);
    }
}
