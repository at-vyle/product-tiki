<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Post',5)->states('rating')->create();
        factory('App\Models\Post',5)->states('comment')->create();
    }
}
