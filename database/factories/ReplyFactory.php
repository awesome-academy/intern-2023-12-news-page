<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
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
            'review_id' => rand(1, 10),
            'status_id' => rand(1, 6),
            'content' => $this->faker->text(50),
        ];
    }
}
