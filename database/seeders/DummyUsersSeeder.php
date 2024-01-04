<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'pelanggan',
                'email' => 'pelanggan@gmail.com',
                'role' => 'pelanggan',
                'password' => Hash::make('password')
            ]
        ];


        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
