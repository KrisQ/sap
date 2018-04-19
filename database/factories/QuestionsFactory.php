<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
      'user_id' => function () {
          return App\User::orderByRaw('RAND()')->first();
      },
      'team_one_id' => function () {
            return App\Team::orderByRaw('RAND()')->first();
      },
      'team_two_id' => function () {
            return App\Team::orderByRaw('RAND()')->first();
      },
      'photo_id' => '2',
      'popularity' => $faker->randomDigit,
      'title' => $faker->text(30),
      'content' => $faker->text(100),
    ];
});
