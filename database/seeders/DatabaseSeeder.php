<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@newsportal.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('Super Admin');

        $editor = User::firstOrCreate(
            ['email' => 'editor@newsportal.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password'),
            ]
        );
        $editor->assignRole('Editor');

        $journalist = User::firstOrCreate(
            ['email' => 'journalist@newsportal.com'],
            [
                'name' => 'Journalist',
                'password' => Hash::make('password'),
            ]
        );
        $journalist->assignRole('Journalist');

        $user = User::firstOrCreate(
            ['email' => 'user@newsportal.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
            ]
        );
        $user->assignRole('User');
    }
}
