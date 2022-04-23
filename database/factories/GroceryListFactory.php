<?php

namespace Database\Factories;

use App\Models\GroceryList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroceryList>
 */
class GroceryListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::query()->pluck('id');

        return [
            'user_id' => $this->faker->unique()->randomElement($users),
        ];
    }
}
