<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Horc;
use Faker\Generator as Faker;

$factory->define(Horc::class, function (Faker $faker) {
    return [
        "payer_id" => 'N-'.$faker->numberBetween($min = 100, $max = 9999),
        "business_name" => $faker->company,
        "address" => $faker->streetAddress,
        "nature" => 'HOTEL',
        "ownership" => $faker->name,
        "contact_number" => $faker->e164PhoneNumber,
        "email" => $faker->safeEmail,
        "owners_address" => $faker->streetAddress,
        "registration_date" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "file_no" => 'LIRS/HORC/MUS/'.$faker->numberBetween($min = 100, $max = 9999),
        "horc_no" => 'HORC/'.$faker->numberBetween($min = 100, $max = 9999),         
    ];
});
