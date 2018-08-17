<?php

use Faker\Generator as Faker;

$factory->define(App\Disciplina::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(30),
        'ementa' => $faker->text(500),
    ];
});

$factory->define(App\Turma::class, function (Faker $faker) {
    return [
        'ministrante' => $faker->name,
        'inicio' => $faker->date(),
        'fim' => $faker->date(),
        'bibliografia' => $faker->text,
        'disciplina_id' => factory(App\Disciplina::class)->create()->id,
    ];
});
