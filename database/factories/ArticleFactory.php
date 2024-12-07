<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'body' => $this->faker->paragraph(),
            'category_id'=> $this->faker->numberBetween(1,4),
            'user_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
