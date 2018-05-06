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

    $factory->define(App\Usuarios::class, function (Faker $faker) {
        return [
            'nome'              =>  $faker->name,
            'email'             =>  $faker->email,
            'telefone'          =>  '(00) 0000-0000',
            'dataNascimento'    =>  $faker->date('Y-m-d'),
            'cargo'             =>  'Teste',
            'salario'           =>  $faker->randomFloat(6, 1000, 2),
            'foto'              =>   'usuarios/avatar_01.png'
        ];
    });
