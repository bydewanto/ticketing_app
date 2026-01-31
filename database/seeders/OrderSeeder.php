<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'user_id' => 2,
                'ticket_id' => 1,
                'total_harga' => 1000000.00,
            ],
            [
                'user_id' => 2,
                'ticket_id' => 4,
                'total_harga' => 150000.00,
            ],
            [
                'user_id' => 2,
                'ticket_id' => 5,
                'total_harga' => 1200000.00,
            ]
        ];        

        foreach ($order as $item) {
            Order::create($item);
        }
    }
}
