<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slot;
use Faker\Generator as Faker;

$factory->define(Slot::class, function (Faker $faker) {
    return [
        'days' => $faker->word,
        'start_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'end_time' => $faker->time($format = 'H:i:s', $max = 'now')
    ];
});
