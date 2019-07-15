<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text,
        'quantity'    => $faker->randomDigit,
        'price'       => $faker->randomDigit,
        'image'       => $faker->imageUrl(),
        // dont specify which attribute to be able to override
        'user_id'  => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
