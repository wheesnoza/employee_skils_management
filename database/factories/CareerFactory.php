<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Career;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Career::class, function (Faker $faker) {
    return [
        'start_year' => $faker->year(),
        'end_year' => $faker->year(),
        'start_month' => $faker->month(),
        'end_month' => $faker->month(),
        'details' => $faker->realText(),
        'user_id' => $faker->numberBetween(1, User::count()),
    ];
});
