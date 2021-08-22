<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(25)->create();
        \App\Models\Post::factory(25)->create();

        foreach(Tag::all() as $tag) {
            $post = \App\Models\Post::inRandomOrder()->take(rand(1, 6))->pluck('id');
            $tag->post()->attach($post);
        }
    }
}
