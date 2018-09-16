<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LokasiTableSeeder::class);
        $this->call(HotelTableSeeder::class);        
        $this->call(FasilitasTableSeeder::class);                
        $this->call(KamarTableSeeder::class);            
    }
}
