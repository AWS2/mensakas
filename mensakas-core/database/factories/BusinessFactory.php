<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use App\BusinessAddress;
use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => rand(910000000, 999999999),
        'logo' => 'https://picsum.photos/75/75',
        'image' => 'https://picsum.photos/600/300',
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

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'day' => rand(0, 6),
        'open_1' => '09:00:00',
        'close_1' => '15:00:00',
        'open_2' => '20:00:00',
        'close_2' => '23:30:00',
    ];
});
