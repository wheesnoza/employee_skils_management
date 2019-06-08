<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Career;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Career::class, function (Faker $faker) {
    return [
        'experience' => $faker->text(13),
        'start_year' => $faker->year('1993'),
        'end_year' => $faker->year('now'),
        'details' => $faker->realText(),
        'user_id' => $faker->numberBetween(1, User::count()),
    ];
});
