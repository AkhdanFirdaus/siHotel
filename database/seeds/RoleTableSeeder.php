<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new Role();
        $member->nama = 'Member';
        $member->deskripsi = 'Pelanggan tetap';
        $member->save();

        $admin = new Role();
        $admin->nama = 'Admin';
        $admin->deskripsi = 'Orang yang memiliki hak akses ke segala hal';
        $admin->save();

        $resepsionis = new Role();
        $resepsionis->nama = 'Resepsionis';
        $resepsionis->deskripsi = 'Petugas resepsionis penerima tamu check-in, guest in house dan check-out';
        $resepsionis->save();

        $manajer = new Role();
        $manajer->nama = 'Manajer';
        $manajer->deskripsi = 'Pengelola Hotel';
        $manajer->save();        
    }
}
