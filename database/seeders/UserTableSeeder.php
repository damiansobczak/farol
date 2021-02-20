<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@p.pl',
            'role' => 0,
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'klient',
            'email' => 'klient@p.pl',
            'role' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'remember_token' => Str::random(10),
        ]);
    }
}
