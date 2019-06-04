<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'address' => $faker->address(),
        'birth_year' => 1998,
        'birth_month' => 3,
        'birth_day' => 31,
        'identification_img' => 'no_image',
        'user_id' => $faker->unique()->numberBetween(1, 51),
    ];
});
