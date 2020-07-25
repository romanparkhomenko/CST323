<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AffinityGroups;
use Faker\Generator as Faker;

$factory->define(AffinityGroups::class, function (Faker $faker) {
    return [
        'id' => '99',
        'groupname' => 'Mark Test Group',
        'city' => 'Phoenix',
        'description' => 'This is a test group for testing',
        'skills' => 'HTML, CSS, lots of dev stuff',
        'education' => 'GCU',
    ];
});
