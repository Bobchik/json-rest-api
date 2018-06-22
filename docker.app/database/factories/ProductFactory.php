<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) use ($factory) {
    $relation = factory('App\Product')->create();
    return [
        'title' => $faker->title,
        'category_id' => $relation->id,
        'manufacturer_id' => $relation->id,
        'price' => $faker->randomDigitNotNull,
        'description' => $faker->text(200),
        'availability' => rand(0, 1),
        'count' => $faker->randomDigitNotNull,
        'image' => $faker->image('public/storage/images',400,300, null, false)
    ];
});
