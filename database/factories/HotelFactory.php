<?php

use Faker\Generator as Faker;
use App\Lokasi;

$factory->define(App\Hotel::class, function (Faker $faker) {
    $lokasis = Lokasi::pluck('id')->toArray();

    return [
        'nama' => $faker->company,
        'lokasi_id' => $faker->randomElement($lokasis),
        'hotel_image' => 'default.png',
        'alamat' => $faker->unique()->address,
        'email' => $faker->unique()->safeEmail,
        'visi' => $faker->sentence(3),
        'misi' => $faker->sentence(5),
        'moto' => $faker->sentence(2),
    ];
});
