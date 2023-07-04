<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'pseudo' => 'admin',
            'password' => Hash::make('Azerty99@'),
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // User::factory(1)->create();
    }
}
