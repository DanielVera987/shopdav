<?php

namespace Database\Factories;

use App\Models\BrandCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BrandCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'brand_id' => '',
            'category_id' => '' 
        ];
    }
}
