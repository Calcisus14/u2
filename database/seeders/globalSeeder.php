<?php

namespace Database\Seeders;
use App\Models\Vendor;
use App\Models\Priority;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

use Illuminate\Database\Seeder;

class globalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::factory()
        ->count(5)
        ->create();
        
        Vendor::factory()
        ->count(10)
        ->create();
        
        Product::factory()
        ->count(20)
        ->create();
        

        User::factory()
        ->count(15)
        ->has(Order::factory()
        ->count(1), 'orders')
        ->create();

        
    }
}