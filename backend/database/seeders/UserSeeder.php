<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'usuario@example.com')->exists()) {
            User::create([
                'name' => 'Jose Silva dos Santos',
                'email' => 'usuario@example.com',
                'password' => Hash::make('12345678', ['rounds' => 12]),
            ]);
        }
        if (!User::where('email', 'contato2@dalete.top')->exists()) {
            User::create([
                'name' => 'Dalete2',
                'email' => 'contato2@dalete.top',
                'password' => Hash::make('12345678', ['rounds' => 12]),
            ]);
        }
        if (!User::where('email', 'contato3@dalete.top')->exists()) {
            User::create([
                'name' => 'Dalete3',
                'email' => 'contato3@dalete.top',
                'password' => Hash::make('12345678', ['rounds' => 12]),
            ]);
        }
    }
}
