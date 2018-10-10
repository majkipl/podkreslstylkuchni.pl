<?php

/** @var Factory $factory */

use App\Enums\ProductType;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(16),
        'code' => $this->faker->numerify('#####-##'),
        'type' => ProductType::RETRO
    ];
});
