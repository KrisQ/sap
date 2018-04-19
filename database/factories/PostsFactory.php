<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
  return [
    'user_id' => function () {
        return App\User::orderByRaw('RAND()')->first();
    },
    'question_id' => function () {
          return App\Question::orderByRaw('RAND()')->first();
    },
    'argument_id' => function () {
          return App\Argument::orderByRaw('RAND()')->first();
    },
    'team_id' => function () {
          return App\Team::orderByRaw('RAND()')->first();
    },
    'upvotes' => $faker->randomDigit,
    'downvotes' => $faker->randomDigit,
    'title' => $faker->text(30),
    'content' => $faker->text(100),
  ];
});
