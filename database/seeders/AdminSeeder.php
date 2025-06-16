<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'admin@gmail.com', 
                'password' => Hash::make('admin1234'), 
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        Admin::firstOrCreate(
            ['email' => 'editor@gmail.com'],
            [
                'name' => 'Editor',
                'username' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('editor1234'),
                'role' => 'editor',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}