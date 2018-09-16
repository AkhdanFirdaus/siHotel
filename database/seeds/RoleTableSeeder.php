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
        $role_manager = new Role();
        $role_manager->nama = 'Member';
        $role_manager->deskripsi = 'Pelanggan tetap';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->nama = 'Manajer';
        $role_manager->deskripsi = 'Pimpinan tertinggi di hotel yang bertugas mengontrol dan mengawasi seluruh kegiatan di dalam dan diluar hotel, serta mengoordinir segala department yang ada di hotel';
        $role_manager->save();

        $role_headReceptionist = new Role();
        $role_headReceptionist->nama = 'Kepala Resepsionis';
        $role_headReceptionist->deskripsi = 'Yaitu pimpinan di seksi resepsi yang bertanggung jawab atas pengawasan dan kelancaran dari kegiatan di bagian penanganan tamu check-in, guest in house, dan check-out';
        $role_headReceptionist->save();

        $receptionist = new Role();
        $receptionist->nama = 'Resepsionis';
        $receptionist->deskripsi = 'Petugas resepsionis penerima tamu check-in, guest in house dan check-out';
        $receptionist->save();        
    }
}
