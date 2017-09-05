<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker){
	return [
		'name' => $faker->name,
		'director' => $faker->name,
		'imageUrl' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/'
		'duration' => $faker->numberBetween(1, 180),
		'releaseDate' => $faker->date($format = 'Y-m-d'),
		'genres' => $faker->words($nb = 3, $asText = false)  
	];
});