<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
   /**
     * Track the index to generate sequential labels.
     *
     * @var int
     */
    protected static $counter = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // Prefix labels based on the counter
        $prefixs = ['slider', 'first', 'second', 'thread', 'four', 'five', 'six'];
        $prefix = $prefixs[(Self::$counter - 1) % count($prefixs)];

        // Generate the key_name with prefix and a base name
        $keyName = "{$prefix}CategoryCard";

        // Increment the counter
        Self::$counter++;

        return [
            'key_name' => $keyName,
            'value' => $this->faker->word(),
        ];
    }
}
