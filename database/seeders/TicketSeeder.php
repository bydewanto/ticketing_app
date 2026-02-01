<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ticket;
use App\Models\events;

class TicketSeeder extends Seeder
{
    public function run() : void
    {
        $tickets = [
            [
                'event_judul' => 'Konser Musik Rock',
                'tipe' => 'Premium',
                'harga' => 500000.00,
                'stok' => 100
            ],
            [
                'event_judul' => 'Konser Musik Rock',
                'tipe' => 'Regular',
                'harga' => 250000.00,
                'stok' => 300
            ],
            [
                'event_judul' => 'Workshop Fotografi',
                'tipe' => 'Premium',
                'harga' => 300000.00,
                'stok' => 50
            ],
            [
                'event_judul' => 'Workshop Fotografi',
                'tipe' => 'Regular',
                'harga' => 150000.00,
                'stok' => 150
            ],
            [
                'event_judul' => 'Pameran Seni Kontemporer',
                'tipe' => 'Premium',
                'harga' => 400000.00,
                'stok' => 80
            ],
            [
                'event_judul' => 'Pameran Seni Kontemporer',
                'tipe' => 'Regular',
                'harga' => 200000.00,
                'stok' => 220
            ]
        ];

        foreach ($tickets as $ticketData) {
            // resolve event by title and fallback to first event
            $event = events::where('judul', $ticketData['event_judul'] ?? null)->first() ?? events::first();
            if (! $event) {
                // no events in DB yet; skip
                continue;
            }

            $payload = [
                'event_id' => $event->id,
                'tipe' => $ticketData['tipe'],
                'harga' => $ticketData['harga'],
                'stok' => $ticketData['stok'],
            ];

            // ensure idempotent seeding
            ticket::updateOrCreate([
                'event_id' => $payload['event_id'],
                'tipe' => $payload['tipe']
            ], $payload);
        }        
    }
}
