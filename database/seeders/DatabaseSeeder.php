<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => fake()->unique()->email(),
        ]);

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class, // Ensure PostSeeder is here to seed posts
            PostTagCategorySeeder::class,
        ]);
    }
}
