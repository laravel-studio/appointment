<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'booking_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'start_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        'end_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        'status' => $this->faker->randomDigit,
    ];
});
