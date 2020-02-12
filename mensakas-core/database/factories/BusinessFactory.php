<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use App\BusinessAddress;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => rand(910000000, 999999999),
        'logo' => $faker->imageUrl($width = 400, $height = 200),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'active' => rand(0, 1),
    ];
});

$factory->define(BusinessAddress::class, function (Faker $faker) {
    return [
        'city' => $faker->city,
        'zip_code' => $faker->numberBetween($min = 1000, $max = 9000),
        'street' => $faker->streetAddress,
        'number' => $faker->randomDigitNotNull
    ];
});
