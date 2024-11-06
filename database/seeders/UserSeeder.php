<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Criando o usuário master
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'is_master' => true,
            'remember_token' => Str::random(10),
        ]);

        // Criando 10 usuários não-masters
        User::factory(10)->create([
            'is_master' => false, // Todos os usuários terão is_master como false
        ]);
    }
}
