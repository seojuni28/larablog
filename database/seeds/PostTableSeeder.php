<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [[
            'title' => 'Firts Article',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod',
            'slug' => 'first-article',
            'photo' => 'content.jpg',
            'user_id' => '1'
        ],[
            'title' => 'Second Article',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod',
            'slug' => 'second-article',
            'photo' => 'content.jpg',
            'user_id' => '1'
        ]];
            Post::insert($posts);
    }
}
