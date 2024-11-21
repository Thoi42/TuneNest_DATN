<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Product;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $customers = Customer::all();
        $products = Product::all();

        for ($i = 0; $i < 50; $i++) {
            $customer = $customers->random();
            $status = $faker->randomElement(['chờ duyệt', 'đang giao', 'đã giao', 'đã hủy']);
            $deliveredAt = null;
            $canceledAt = null;

            if ($status === 'đã giao') {
                $deliveredAt = $faker->dateTimeBetween('now', '+1 week');
            } elseif ($status === 'đã hủy') {
                $canceledAt = $faker->dateTimeBetween('now', '+3 day');
            }

            $order = Order::create([
                'customer_id' => $customer->id,
                'discount_id' => null,
                'name' => $customer->name,
                'email' => $customer->email,
                'status' => $status,
                'customer_note' => $faker->optional()->sentence,
                'user_note' => $faker->optional()->sentence,
                'address' => $faker->address,
                'phone' => $customer->phone,
                'delivered_at' => $deliveredAt,
                'canceled_at' => $canceledAt,
                'total' => 0, // Khởi tạo tổng tiền là 0
            ]);

            $numberOfProducts = $faker->numberBetween(1, 5);
            $orderProducts = $products->random($numberOfProducts);
            $total = 0;

            foreach ($orderProducts as $product) {
                $quantity = $faker->numberBetween(1, 5);
                $price = $product->price;
                $subtotal = $quantity * $price;
                $total += $subtotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }

            $order->update(['total' => $total]);
        }
    }
}
