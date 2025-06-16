<?php

namespace Database\Seeders;

use App\Models\Admin; // Tambahkan ini
use App\Models\User;
use App\Models\SocialMedia;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ======================
        // 1. SEEDER UNTUK ADMIN
        // ======================
        Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'admin@gmail.com', // Konsistensi data
                'password' => Hash::make('admin1234'),
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // ======================
        // 2. SEEDER UNTUK USER BIASA
        // ======================
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password') // Default password untuk testing
        ]);

        // ======================
        // 3. SEEDER UNTUK FITUR LAIN
        // ======================
        SocialMedia::create([
            'name' => 'Instagram',
            'icon' => 'fab fa-instagram',
            'url' => 'https://instagram.com/mizyanstore',
            'is_active' => true
        ]);

        BlogCategory::create([
            'name' => 'Fashion Muslimah',
            'slug' => 'fashion-muslimah',
            'is_active' => true
        ]);

        // ======================
        // 4. SEEDER TAMBAHAN (OPTIONAL)
        // ======================
        // User::factory(10)->create(); // Uncomment jika butuh dummy users
    }
}