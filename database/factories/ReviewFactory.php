<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'post_id' => rand(1, 10),
            'status_id' => rand(1, 6),
            'content' => $this->faker->text(50),
        ];
    }
}
