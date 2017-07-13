<?php

$factory->define(Boye\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'skills' => $faker->word,
        'gender' => $faker->numberBetween(0, 1),
        'confirm_code'   => str_random(64),
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(Boye\Category::class, function (Faker\Generator $faker) {

     $title = $faker->sentence(mt_rand(3,6));
    return [
        'title' => $faker->name,
       'slug' => $title
    ];
});

$factory->define(Boye\Post::class, function (Faker\Generator $faker) {
   $title = $faker->sentence(mt_rand(2,5));
    return [
        'user_id' => Boye\User::all()->random()->id,
        'category_id' => Boye\Category::all()->random()->id,
        'tags' => $faker->word,
        'title' => $title,
        'content' => $faker->paragraph(random_int(1, 100)),
       'slug' => str_slug($title),
       'status' => '1',
    ];
});

$factory->define(Boye\Comment::class, function (Faker\Generator $faker) {

    return [
        'user_id' => Boye\User::all()->random()->id,
        'post_id' => Boye\Post::all()->random()->id,
        'content' => $faker->paragraph(random_int(1, 10)),
    ];
});

$factory->define(Boye\Price::class, function(Faker\Generator $faker){
    $title = $faker->word;
    return [
    'title'     =>  $title,
    'description' => $faker->paragraph(random_int(1, 8)),
    'amount'        => '20,000',
    'slug'      =>      str_slug($title),
    'symbol'        =>  'fa fa-naira'
    ];
});

$factory->define(Boye\PriceItem::class, function(Faker\Generator $faker){
    return [
    'price_id'      => Boye\Price::all()->random()->id,
    'features'      =>  $faker->word,
    'icon'          =>  'fa fa-check'
    ];
});
$factory->define(Boye\Visitor::class, function (Faker\Generator $faker) {
    $post_id = \Boye\Post::pluck('id')->random();
    $num = $faker->numberBetween(1, 100);

    $post = Boye\Post::find($post_id);
    $post->view_count = $num;
    $post->save();

    return [
        'post_id' => $post_id,
        'ip'         => $faker->ipv4,
        'country'    => 'NG',
        'clicks'     => $num
    ];
});