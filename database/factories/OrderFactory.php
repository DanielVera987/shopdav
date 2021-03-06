<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '',
            'order_statu_id' => '',
            'shipping_type' => 'T',
            'shipping_cost' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
