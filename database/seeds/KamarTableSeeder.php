<?php

use Illuminate\Database\Seeder;

class KamarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kamar::class, 150)->create();
    }
}
