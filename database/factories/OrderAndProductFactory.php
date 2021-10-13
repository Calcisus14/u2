<?php

namespace Database\Factories;

use App\Models\OrderAndProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderAndProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderAndProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'=> 0,
            'product_id'=> Product::select('id')->inRandomOrder()->first()
        ];
    }
}