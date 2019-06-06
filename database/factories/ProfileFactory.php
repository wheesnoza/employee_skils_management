<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'address' => $faker->streetAddress(),
        'birth_year' => 1998,
        'birth_month' => 3,
        'birth_day' => 31,
        'user_id' => $faker->unique()->numberBetween(1, User::count()),
    ];
});
