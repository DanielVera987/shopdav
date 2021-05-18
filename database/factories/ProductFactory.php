<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), 
            'description' => $this->faker->paragraph(5), 
            'code' => '00000000'.$this->faker->randomDigit(), 
            'price' => $this->faker->randomFloat(2, 1, 100), 
            'quantity' => $this->faker->randomDigit(), 
            'subcategory_id' => '', 
            'brand_id' => '', 
            'discount_id' => null
        ];
    }
}
