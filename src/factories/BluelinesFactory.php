<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 7/22/2017
     * Time: 7:22 PM
     */


    $factory->define(\ShawnSandy\Bluelines\App\Blueline::class, function (Faker\Generator $faker) {
        return [
            'title' => $faker->catchPhrase,
            'excerpt' => $faker->sentence,
            'body' => $faker->realText(),
            "status" => 1,
            "type" => "post",
            "author_id" => 1,
            "featured" => 0,
        ];
    });

    $factory->define(\ShawnSandy\Bluelines\App\BluelinesCategory::class, function(\Faker\Generator $faker){
        return [
            "name" => $faker->word,
            "description" => $faker->sentence,
        ];
    });


    $factory->define(\ShawnSandy\Bluelines\App\BluelinesTag::class, function(\Faker\Generator $faker){
        return [
            "tag_name" => $faker->word,
        ];
    });
