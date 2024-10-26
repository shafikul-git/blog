<?php

namespace Database\Factories\Post;

use App\Models\post\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'meta_title' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'pending']),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
            'meta_description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
            'featured_image' => $this->faker->imageUrl(640, 480, 'posts', true),
            'alt_name' => $this->faker->words(3, true),
            'published_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'author_id' => \App\Models\User::factory(), 
        ];
    }
}
