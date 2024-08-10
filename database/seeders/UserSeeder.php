<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'UserA',
             'email' => 'usera@example.com',
             'password' => Hash::make('usera'),
         ]);
         \App\Models\User::factory()->create([
            'name' => 'UserB',
            'email' => 'userb@example.com',
            'password' => Hash::make('userb'),
        ]);

    }
}
