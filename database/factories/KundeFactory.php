<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kunde;
use Faker\Generator as Faker;

$factory->define(Kunde::class, function (Faker $faker) {
    return [
        //
        'vorname' => $faker->name,
        'nachname' => $faker->name,
        'gewerblicher_kunde' => $faker->boolean
    ];
});
