<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'surname' => $faker->firstName,
        'firstname' => $faker->firstName('male' | 'female'),
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'age' => $faker->numberBetween(20, 45),
        'password' => $faker->md5,
        'gender' => $faker->randomElement($array = array ('male', 'female')),
        'address'  => $faker->address,
        'department' => $faker->text(25),
        'staff_id' => $faker->uuid,
        'disable' => $faker->boolean
    ];
});
