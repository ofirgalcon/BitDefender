<?php

// Database seeder
// Please visit https://github.com/fzaninotto/Faker for more options

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Bitdefender_model::class, function (Faker\Generator $faker) {

    return [
        'av_enabled' => $faker->boolean(),
        'product_version' => $faker->word(),
        'av_signature_version' => $faker->word(),
        'last_update' => $faker->randomNumber($nbDigits = 4, $strict = false),
        'error_num' => $faker->randomNumber($nbDigits = 4, $strict = false),
    ];
});
