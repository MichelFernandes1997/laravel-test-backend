<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imovel;
use Faker\Generator as Faker;

$factory->define(Imovel::class, function (Faker $faker) {
    return [
        'emailProprietario' => $faker->email,
        'estado' => $faker->state,
        'cidade' => $faker->city,
        'rua' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'complemento' => $faker->sentence($nbWords = 2, $variableNbWords = true) ,
        'contrato_id' => null
    ];
});
