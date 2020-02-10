<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\CustomerAddress;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber
    ];
});

$factory->define(CustomerAddress::class, function (Faker $faker) {
    return [
        'city' => $faker->city,
        'zipCode' => $faker->numberBetween($min = 1000, $max = 9000),
        'street' => $faker->streetAddress,
        'number' => $faker->randomDigitNotNull,
        'house_number' => $faker->randomDigitNotNull
    ];
});
