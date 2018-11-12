<?php

use Faker\Generator as Faker;
use App\Model\Product;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'product_id' => function()
        {   
            Product::all()->random();
        },
        'customer' => $faker->name, 
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0, 5)
    ];
});
