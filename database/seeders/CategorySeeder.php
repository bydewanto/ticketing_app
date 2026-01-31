<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ['name' => 'Konser'],
            ['name' => 'Pameran Seni'],
            ['name' => 'Festival Budaya'],
            ['name' => 'Workshop'],
            ['name' => 'Seminar'],
            ['name' => 'Olahraga'],
            ['name' => 'Teater'],
            ['name' => 'Komedi'],
            ['name' => 'Film'],
            ['name' => 'Lainnya']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
