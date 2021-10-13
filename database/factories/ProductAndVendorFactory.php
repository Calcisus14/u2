<?php

namespace Database\Factories;

use App\Models\ProductAndVendor;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAndVendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAndVendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=> 0,
            'vendor_id'=> Vendor::select('id')->inRandomOrder()->first()
        ];
    }
}