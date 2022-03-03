<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'uuid' => Str::uuid(),
            'role_id' => 1,
            'name' => "Aboubakary Cissé",
            'profile' => "users/default.png",
            'email' => "aboubakarycisse410@gmail.com",
            'email_verified_at' => now(),
            'phone' => 66292862,
            'password' => Hash::make('K4Africa')
        ]);
    }
}
