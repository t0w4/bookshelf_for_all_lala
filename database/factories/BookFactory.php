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

$factory->define(App\Book::class, function (Faker\Generator $faker) {

    return [
        'title'           => $faker->name,
        'author'          => $faker->name,
        'publisher'       => $faker->company,
        'isbn'            => $faker->numberBetween($min = 100000000,$max = 999999999),
        'publicationDate' => $faker->date($format='Y-m-d',$max='now'),
        'image'           => 'https://images-na.ssl-images-amazon.com/images/I/51L3BljrDHL._SX350_BO1,204,203,200_.jpg',
        'description'     => $faker->text,

    ];
});

