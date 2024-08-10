<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Fetch all products
        $products = Product::all();

        // Create an order
        $order = Order::create([
            'type' => Order::BUY, // Example type for the order
        ]);

        // Attach products to the order with pivot data (price and amount)
        foreach ($products as $product) {
            $order->products()->attach($product, [
                'price' => $product->price, // Assuming 'price' is a field in the Product model
                'amount' => 2, // Example amount, you can adjust as per your needs
            ]);
        }

        // Create an order
        $order = Order::create([
            'type' => Order::SELL, // Example type for the order
        ]);

        // Attach products to the order with pivot data (price and amount)
        foreach ($products as $product) {
            $order->products()->attach($product, [
                'price' => $product->price, // Assuming 'price' is a field in the Product model
                'amount' => 1, // Example amount, you can adjust as per your needs
            ]);
        }
    }
}
