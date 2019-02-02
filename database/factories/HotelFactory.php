<?php

use Faker\Generator as Faker;
use App\Lokasi;

$factory->define(App\Hotel::class, function (Faker $faker) {
    $lokasis = Lokasi::pluck('id')->toArray();
    $nama = $faker->company;
    return [
        'nama' => $nama,
        'slug' => str_slug($nama, '-'),
        'lokasi_id' => $faker->randomElement($lokasis),
        'hotel_image' => 'default.png',
        'alamat' => $faker->unique()->address,
        'email' => $faker->unique()->safeEmail,
        'rekening' => $faker->creditCardType,
        'no_rekening' => $faker->creditCardNumber,
        'moto' => $faker->sentence(2),
    ];
});
