<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text,
        'quantity'    => $faker->randomDigit,
        'price'       => $faker->randomDigit,
        'image'       => $faker->imageUrl()
    ];
});
