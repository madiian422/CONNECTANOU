<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entreprise;
use Faker\Generator as Faker;
// factory(App\Entreprise::class,20)->create();
$factory->define(Entreprise::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
