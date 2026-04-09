<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'sales']);
        Role::create(['name' => 'affiliate']);
        Role::create(['name' => 'user']);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin Kabar Kita',
            'email' => 'admin@kabarkita.online',
            'password' => Hash::make('password'),
            'plan_type' => 'special',
        ]);
        $admin->assignRole('admin');

        // Create Sample Themes
        Theme::create([
            'name' => 'Elegant Classic',
            'category' => 'elegan',
            'component_name' => 'Themes/Elegant',
            'is_premium' => false,
        ]);

        Theme::create([
            'name' => 'Modern Minimalist',
            'category' => 'modern',
            'component_name' => 'Themes/Modern',
            'is_premium' => true,
        ]);
        
        Theme::create([
            'name' => 'Islamic Floral',
            'category' => 'islami',
            'component_name' => 'Themes/Islamic',
            'is_premium' => true,
        ]);
    }
}
