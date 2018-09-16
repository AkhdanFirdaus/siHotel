<?php

use Faker\Generator as Faker;

$factory->define(App\Lokasi::class, function (Faker $faker) {
    return [
        'lokasi' => $faker->city
    ];
});
