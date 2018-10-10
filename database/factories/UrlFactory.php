<?php

/** @var Factory $factory */

use App\Models\Product;
use App\Models\Url;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Url::class, function (Faker $faker) {
    $product = factory(Product::class)->create();

    return [
        'url' => $faker->url,
        'product_id' => $product->id
    ];
});
