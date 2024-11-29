<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder

{
    public function run()
    {
        Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@superadmin2.com',
            'password' => Hash::make('1234567'), // Use a secure password in production
            'role' => 'superadmin', // Assuming you have a role column and using 'superadmin'
            'permissions' => json_encode([]), // Adjust permissions if needed
        ]);

        Admin::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234567'), // Always hash the password
            'role' => 'admin',
            'permissions' => json_encode([]),  // Or 'admin', depending on the role
        ]);
    }
}
