<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => $this->faker->unique()->realText('20'),
            'post_id'=> $this->faker->numberBetween('1','100'),
            'user_id'=> $this->faker->numberBetween('1','10'),
            'created_at' => now(),
        ];
    }
}
