<?php

/** @var Factory $factory */

use App\Models\Application;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Application::class, function (Faker $faker) {

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => '+48' . $faker->numberBetween('123456789', '999999999'),
        'address' => $faker->streetAddress,
        'address_nb' => $faker->streetSuffix,
        'city' => $faker->city,
        'zip' => $faker->numberBetween(10,99) . '-' . $faker->numberBetween(100,999),
        'img_receipt' => 'receipts/z8cQ1QnxrY6BlXkKZeTNN5WFzciIzVuRFDmfWEvu.jpg',
        'img_ean' => 'eans/z8cQ1QnxrY6BlXkKZeTNN5WFzciIzVuRFDmfWEvu.jpg',
        'img_box' => 'boxes/z8cQ1QnxrY6BlXkKZeTNN5WFzciIzVuRFDmfWEvu.jpg',
        'legal_1' => true,
        'legal_2' => true,
        'legal_3' => true,
        'legal_4' => $faker->numberBetween(0,1),
//        'token' => Str::random(32),
    ];
});
