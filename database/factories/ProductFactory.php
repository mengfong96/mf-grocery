<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> Str::random(16),
            'image_path'=> Str::random(5).".png",
            'desc'=> $this->faker->paragraph(),
            'overview'=>$this->faker->sentence(),
        ];
    }
}
