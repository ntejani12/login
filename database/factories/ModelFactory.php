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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
       	'address' => $faker->address,
       	'city' => $faker->city,
       	'state'=> $faker->state,
       	'zip' => $faker->postcode,
       	'phone' => $faker->phoneNumber,
       	'website' => $faker->domainName,
       	'par1' => $faker->randomDigit,
       	'color1' => $faker->colorName,
       	'color2' => $faker->colorName,
       	'color3' => $faker->colorName,
       	'color4' => $faker->colorName,
       	'color5' => $faker->colorName,
       	'color6' => $faker->colorName,


       
       	
       

       	'hdcp1' => $faker->randomDigit


      

       	//$course = factory(App\Course::class)->create();
    ];
});
