<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Role::class, function () {
    return [
        'name' => 'user'
    ];
});

$factory->define(App\Models\Media::class, function (Faker\Generator $faker) {
    return [
        'link' => $faker->word,
        'name' => $faker->word
    ];
});
$factory->define(App\Models\Option::class, function (Faker\Generator $faker) {
    return [
        'key' => $faker->word,
        'value' => $faker->word
    ];
});

$factory->define(App\Models\Groups::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Disciplines::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Criterion::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'question_group' => $faker->word,
        'number' => $faker->word,
    ];
});

$factory->define(App\Models\Questionnaire::class, function (Faker\Generator $faker) {
    return [
        'rate' => $faker->randomNumber(),
    ];
});