<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'title' => $title,
            'slug' => \Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1000, 999999),
            'content' => $this->faker->paragraphs(5, true),
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXn1LxNpgOr5fxc_d3q4ObDF8C2vNn-3tvAQ&s',
            'published_at' => $this->faker->optional(0.7)->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
