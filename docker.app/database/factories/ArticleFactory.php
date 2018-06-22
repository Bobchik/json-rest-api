<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'author_id' => factory(App\People::class)->create()->id,
        'title' => $faker->text(20)
    ];
});
