<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\ProductDescription;
use App\ProductTag;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'business_id' => rand(0, 10),
        'price'  => rand(110, 3999) / 10,
        'avalible' => rand(0, 1),
        'image' => $faker->imageUrl()
    ];
});

$factory->define(ProductTag::class, function (Faker $faker) {
    return [
        'tag' => 1,
    ];
});

$factory->define(ProductDescription::class, function (Faker $faker) {
    return [];
});
