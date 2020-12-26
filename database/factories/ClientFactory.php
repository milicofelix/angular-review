<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Entities\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'responsible'  => $faker->name,
        'email'  => $faker->email,
        'phone'  => $faker->phoneNumber,
        'address'  => $faker->address,
        'obs'  => $faker->sentence
    ];
});
