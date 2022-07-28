<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'title' => $this->faker->text('10'),
            'text' => $this->faker->unique()->realText('300'),
            'user_id'=> $this->faker->numberBetween('1','10'),
            'category_id'=> $this->faker->numberBetween('1','6'),
            'created_at' => now(),
        ];
    }
}
