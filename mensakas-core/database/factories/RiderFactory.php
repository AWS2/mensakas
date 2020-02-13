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
        'latitude' => rand(10000, 99999) / 1000,
        'longitude' => rand(10000, 99999) / 1000,
        'accuracy' => rand(100, 999) / 10,
        'speed' => rand(0, 80)
    ];
});

$factory->define(Delivery::class, function () {
    return [
        'order_id' => 1,
        'delivery' => FakerTime::time($format = 'H:i:s')
    ];
});
