<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use App\Models\post\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTagCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::all()->each(function ($post) {
            // Attach random tags
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $post->tags()->attach($tags);

            // Attach random categories
            $categories = Category::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $post->categories()->attach($categories);
        });
    }
}
