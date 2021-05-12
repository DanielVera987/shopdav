<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => '',
            'name' => $this->faker->name(),
            'code' => $this->faker->randomDigit(),
            'active' => $this->faker->randomDigit(),
            'discount_percent' => $this->faker->randomFloat(2, 1, 90),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date()
        ];
    }
}
