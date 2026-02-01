<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'no_telp' => '081234567890',
                'role' => 'user'
            ]
        ];
        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }   
    }
}
