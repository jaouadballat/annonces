<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\City::class, function(Faker $faker) {
	return [
		'name' => $faker->city
	];
});

$factory->define(App\Company::class, function(Faker $faker) {
	return [
		'name' => $faker->company,
		'city_id' => \App\City::get()->random()->id,
		'category_id' => \App\Category::get()->random()->id,
		'address' => $faker->address,
		'description' => $faker->text(100),
		'logo' => 'logo.jpg'
	];
});


