<?php

namespace Database\Factories;

use App\Models\GroceryList;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroceryListProduct>
 */
class GroceryListProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'grocery_list_id' => GroceryList::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => $this->faker->randomElement([1,2,3,4,5])
        ];
    }
}
