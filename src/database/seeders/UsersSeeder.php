<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

//        User::create([
//            'name'      => 'user-01',
//            'first_name'    => 'Iam',
//            'last_name'     => 'User',
//            'email'         => 'user@app.local',
//            'email_verified_at' => now(),
//            'password'      => Hash::make('12qwaszx'),
//            'remember_token' => Str::random(10),
//            'created_at'    => now(),
//          ]);
    }
}
