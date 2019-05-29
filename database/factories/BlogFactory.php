<?php

use Faker\Generator as Faker;
use App\Blog;
$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title'=>\Faker\Provider\Lorem::sentence($nbWords = 9, $variableNbWords = true),
        'theme_id'=>\Faker\Provider\Lorem::numberBetween($min = 1, $max = 5),
        'category_id'=>\Faker\Provider\Lorem::numberBetween($min = 1, $max = 5),
        'publish'=>\Faker\Provider\Lorem::numberBetween($min = 1, $max = 2),
        'image_path'=>\Faker\Provider\Image::imageUrl($width = 640, $height = 480,'cats'),
        'body'=>\Faker\Provider\Lorem::text($maxNbChars = 500),
    ];
});
