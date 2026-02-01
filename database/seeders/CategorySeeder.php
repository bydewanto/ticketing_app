<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['nama' => 'Konser'],
            ['nama' => 'Pameran Seni'],
            ['nama' => 'Festival Budaya'],
            ['nama' => 'Workshop'],
            ['nama' => 'Seminar'],
            ['nama' => 'Olahraga'],
            ['nama' => 'Teater'],
            ['nama' => 'Komedi'],
            ['nama' => 'Film'],
            ['nama' => 'Lainnya']
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['nama' => $category['nama']], $category);
        }
    }
}
