<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = ['admin', 'buyer', 'seller'];

        foreach ($roles as $index => $role) {

            $email = "test." . $role . "@example.com";
            $phone = '0123456789' . $index;

            if (User::where('email', $email)->orWhere('phone', $phone)->exists()) {
                continue;
            }

            $user = User::create([
                'firstName' => "Test",
                'lastName' => ucfirst($role),
                'email' => $email,
                'phone' => $phone,
                'password' => Hash::make('password'),
                'role' => $role
            ]);
        }
    }
}
