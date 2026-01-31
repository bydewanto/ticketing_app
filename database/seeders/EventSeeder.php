<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'user_id' => 2,
                'category_id' => 1,
                'judul' => 'Konser Musik Rock',
                'deskripsi' => 'Nikmati malam penuh energi dengan band rock terkenal.',
                'lokasi' => 'Stadion Utama',
                'tanggal_waktu' => '2024-07-15 19:00:00',
                'gambar' => 'konser_rock.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 4,
                'judul' => 'Workshop Fotografi',
                'deskripsi' => 'Pelajari teknik fotografi dari fotografer profesional.',
                'lokasi' => 'Studio Kreatif',
                'tanggal_waktu' => '2024-08-10 10:00:00',
                'gambar' => 'workshop_fotografi.jpg'
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'judul' => 'Pameran Seni Kontemporer',
                'deskripsi' => 'Jelajahi karya seni kontemporer dari seniman lokal dan internasional.',
                'lokasi' => 'Galeri Seni Modern',
                'tanggal_waktu' => '2024-09-05 09:00:00',
                'gambar' => 'pameran_seni.jpg'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }        
    }
}
