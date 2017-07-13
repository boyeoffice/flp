<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(User::class);
      // factory(App\User::class, 50)->create();
       //factory(App\Category::class, 20)->create();
       //factory(App\Post::class, 100)->create();
       //factory(App\Comment::class, 20)->create();
       //factory(App\Visitor::class, 100)->create();
        $this->call(Setting::class);
    }
}
