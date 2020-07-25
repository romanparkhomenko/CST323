<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobPosts;
use Faker\Generator as Faker;

$factory->define(JobPosts::class, function (Faker $faker) {
    return [
        'id' => '99',
        'companyname' => 'Apple',
        'jobtitle' => 'Software Engineer',
        'salary' => 100000,
        'description' => 'Work a coool job for a cool company',
        'city' => 'Cupertino',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
