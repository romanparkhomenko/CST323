<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => '99',
        'firstname' => 'Mark',
        'lastname' => 'Reha',
        'username' => 'markreha',
        'password' => bcrypt('test'),
        'email' => 'markreha@test.com',
        'phone' => '1234567890',
        'about' => 'Mark is a test account',
        'jobtitle' => 'QA Automation Engineer',
        'isAdmin' => '1',
        'skills' => 'Testing stuff',
        'jobhistory' => 'Tester at Laravel',
        'education' => 'GCU',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
