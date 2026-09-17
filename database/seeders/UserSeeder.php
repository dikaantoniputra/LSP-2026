<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Dika Administrator',
                'email' => 'admin@dika.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Staff Gudang',
                'email' => 'gudang@dika.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Operator Kasir',
                'email' => 'kasir@dika.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}

