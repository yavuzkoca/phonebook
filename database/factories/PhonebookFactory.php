<?php

use Faker\Generator as Faker;

$factory->define(\App\Phonebook::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
