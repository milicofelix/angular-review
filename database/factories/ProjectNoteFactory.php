<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\ProjectNote;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProjectNote::class, function (Faker $faker) {
    return [
        'project_id' => rand(1, 10),
        'title' => $faker->word,
        'note' => $faker->paragraph
    ];
});
