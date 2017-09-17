<?php

use Faker\Generator as Faker;

$factory->define(App\Business::class, function (Faker $faker) {
    $categories = App\Category::all()->random(3);
    // $category2 = App\Category::all()->random();

    return [
      'title'       => $faker->company,
      'phone'       => $faker->tollFreePhoneNumber,
      'address'     => $faker->address,
      'cep'         => $faker->numberBetween(12345, 98765) + '-' + $faker->numberBetween(123,987),
      'city'        => $faker->city,
      'state'       => $faker->state,
      'description' => $faker->realText(100),
    ];
});
