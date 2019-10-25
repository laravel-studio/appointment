<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
         'title'          => $this->faker->sentence,
           'description'    => $this->faker->paragraph,
           'terms'          => $this->faker->paragraph,
           'duration'       => $this->faker->randomDigitNotNull
    ];
});
