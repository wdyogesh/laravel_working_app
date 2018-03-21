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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'user_type' => $faker->randomElement(['seller', 'buyer']),
        'avatar_path' => 'default.png',
        'temp_password' => str_random(6)
    ];
});

$factory->define(App\Host::class, function (Faker\Generator $faker) {
	$user = factory(App\User::class)->create();
    return [
        'user_id' => $user->id,
        'host_type' => $faker->randomElement(['homestay', 'share-house']), 
        'mobile_number', 
        'occupation', 
        'gender', 
        'date_birth', 
        'country', 
        'hear_about_us',
        'hosted_students_before', 
        'since_when', 
        'can_students_smoke', 
        'have_pets', 
        'special_dietarian',
    ];
});

$factory->define(App\Vacancy::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});