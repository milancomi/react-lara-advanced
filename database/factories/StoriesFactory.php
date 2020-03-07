<?php

namespace App;


use App\Story;
use Faker\Generator as Faker;


$factory->define(Story::class, function (Faker $faker) {

    return [
        "title" => $faker->sentence,
        "description" =>  $faker->paragraph,
        "due_date" => $faker->date('Y-m-d'),
        "story_point" => $faker->randomElement([0,2,3,5,6,13]),
        "story_type" => $faker->randomElement(['Bug','Feature','Enhancement']),
        "user_id" => 1,
        "epic_id" => 1,
    ];
});

// php artisan tinker


// factory(App\Story::class,5)->create();
