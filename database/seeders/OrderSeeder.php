<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\order;
use App\Models\ticket;
use App\Models\detail_order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
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

        foreach ($orders as $item) {
            // resolve user and ticket; skip if missing
            $user = User::find($item['user_id'] ?? null) ?? User::first();
            if (! $user) {
                continue;
            }

            $ticket = ticket::find($item['ticket_id'] ?? null);
            if (! $ticket) {
                // ticket not found; skip this order
                continue;
            }

            // compute quantity (fallback to 1) and subtotal
            $totalHarga = $item['total_harga'] ?? ($ticket->harga ?? 0);
            $quantity = max(1, (int) round($totalHarga / ($ticket->harga ?: 1)));
            $subtotal = ($ticket->harga ?: 0) * $quantity;

            // create order
            $order = order::create([
                'user_id' => $user->id,
                'event_id' => $ticket->event_id,
                'order_date' => now(),
                'total_price' => $totalHarga,
            ]);

            // create detail order
            detail_order::create([
                'order_id' => $order->id,
                'ticket_id' => $ticket->id,
                'quantity' => $quantity,
                'subtotal_price' => $subtotal,
            ]);
        }
    }
}
