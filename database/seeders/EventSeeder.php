<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\events;
use App\Models\User;
use App\Models\Category;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'user_email' => 'user@gmail.com',
                'category' => 'Konser',
                'judul' => 'Konser Musik Rock',
                'deskripsi' => 'Nikmati malam penuh energi dengan band rock terkenal.',
                'lokasi' => 'Stadion Utama',
                'tanggal_waktu' => '2024-07-15 19:00:00',
                'gambar' => 'konser_rock.jpg'
            ],
            [
                'user_email' => 'user@gmail.com',
                'category' => 'Workshop',
                'judul' => 'Workshop Fotografi',
                'deskripsi' => 'Pelajari teknik fotografi dari fotografer profesional.',
                'lokasi' => 'Studio Kreatif',
                'tanggal_waktu' => '2024-08-10 10:00:00',
                'gambar' => 'workshop_fotografi.jpg'
            ],
            [
                'user_email' => 'user@gmail.com',
                'category' => 'Pameran Seni',
                'judul' => 'Pameran Seni Kontemporer',
                'deskripsi' => 'Jelajahi karya seni kontemporer dari seniman lokal dan internasional.',
                'lokasi' => 'Galeri Seni Modern',
                'tanggal_waktu' => '2024-09-05 09:00:00',
                'gambar' => 'pameran_seni.jpg'
            ]
        ];

        foreach ($events as $eventData) {
            // resolve user (by email) and fallback to first user
            $user = User::where('email', $eventData['user_email'] ?? null)->first() ?? User::first();
            if (! $user) {
                // nothing to associate with; skip this event
                continue;
            }

            // resolve category (by nama) and fallback to first category
            $category = Category::where('nama', $eventData['category'] ?? null)->first() ?? Category::first();
            if (! $category) {
                continue;
            }

            $payload = [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'judul' => $eventData['judul'],
                'deskripsi' => $eventData['deskripsi'],
                'lokasi' => $eventData['lokasi'],
                'tanggal_waktu' => $eventData['tanggal_waktu'],
                'gambar' => $eventData['gambar'],
            ];

            events::updateOrCreate(['judul' => $payload['judul']], $payload);
        }        
    }
}
