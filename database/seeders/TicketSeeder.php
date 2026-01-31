<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = [
            [
                'event_id' => 1,
                'tipe' => 'Premium',
                'harga' => 500000.00,
                'stok' => 100
            ],
            [
                'event_id' => 1,
                'tipe' => 'Regular',
                'harga' => 250000.00,
                'stok' => 300
            ],
            [
                'event_id' => 2,
                'tipe' => 'Premium',
                'harga' => 300000.00,
                'stok' => 50
            ],
            [
                'event_id' => 2,
                'tipe' => 'Regular',
                'harga' => 150000.00,
                'stok' => 150
            ],
            [
                'event_id' => 3,
                'tipe' => 'Premium',
                'harga' => 400000.00,
                'stok' => 80
            ],
            [
                'event_id' => 3,
                'tipe' => 'Regular',
                'harga' => 200000.00,
                'stok' => 220
            ]
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }        
    }
}
