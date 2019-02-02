<?php

use Faker\Generator as Faker;
use App\Fasilitas;
use App\Hotel;

$factory->define(App\Kamar::class, function (Faker $faker) {
	$fasilitas = Fasilitas::pluck('id')->toArray();
	$hotels = Hotel::pluck('id')->toArray();
	$harga = [100000, 125000, 150000, 175000, 200000, 250000, 300000, 350000, 400000, 450000, 500000];
    return [
        'kode_kamar' => $faker->numberBetween(1, 30).$faker->randomLetter,
        'fasilitas_id' => $faker->randomElement($fasilitas),
        'hotel_id' => $faker->randomElement($hotels),
        'harga' => $faker->randomElement($harga)
    ];
});
