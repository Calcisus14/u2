<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductAndVendor;
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
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'quantity' => $this->faker->randomDigit,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            ProductAndVendor::factory()
            ->count(1)
            ->state([
                'product_id' => Product::select('id')->inRandomOrder()->first(),
            ])
            ->create();
        });
    }
}