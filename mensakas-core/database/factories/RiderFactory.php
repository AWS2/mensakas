<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rider;
use App\Location;
use App\Delivery;
use Faker\Generator as Faker;
use Faker\Provider\es_ES\Address as FakerEs;
use Faker\Provider\DateTime as FakerTime;

$factory->define(Rider::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastname,
        'active' => rand(0, 1),
        'username' => $faker->unique()->userName,
        'phone' => rand(910000000, 999999999)
    ];
});

$factory->define(Location::class, function (Faker $faker) {
    return [
        'latitude' => FakerEs::latitude($min = -90, $max = 90),
        'longitude'=> FakerEs::longitude($min = -180, $max = 180),
        'accuracy' => rand(10,10000),
        'speed' => rand(0,80)
    ];
});

$factory->define(Delivery::class, function () {
    return [
        'Delivery' =>FakerTime::time($format = 'H:i:s')
    ];
});


