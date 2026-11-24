<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists to prevent duplicates
        if (User::where('email', 'allfurniture@gmail.com')->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin ALL FURNITURE',
            'email' => 'allfurniture@gmail.com',
            'password' => Hash::make('HakaisinKING'),
            'role' => 'admin',
        ]);
    }
}
