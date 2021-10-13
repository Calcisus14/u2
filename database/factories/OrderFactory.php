<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Priority;
use App\Models\User;
use App\Models\OrderAndProduct;

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
            'delivery_date'=> $this->faker->date('Y-m-d H:i:s'),
            'priority_id'=> Priority::select('id')->inRandomOrder()->first(),
            'user_id'=> User::select('id')->inRandomOrder()->first()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            OrderAndProduct::factory()
            ->count(rand(1, 5))
            ->state([
                'order_id' => Order::select('id')->orderby('id', 'desc')->first(),
            ])
            ->create();
        });
    }

}