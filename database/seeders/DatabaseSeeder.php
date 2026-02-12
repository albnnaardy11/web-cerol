<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@deandles.com',
            'password' => bcrypt('password'), // password
            'role' => 'admin',
        ]);

        // Create Regular User
        User::factory()->create([
            'name' => 'Regular User',
            'username' => 'user',
            'email' => 'user@deandles.com',
            'password' => bcrypt('password'), // password
            'role' => 'user',
        ]);

        // Create Categories
        $categories = [
            ['name' => 'Fiksi', 'slug' => 'fiksi'],
            ['name' => 'Edukasi', 'slug' => 'edukasi'],
            ['name' => 'Dongeng', 'slug' => 'dongeng'],
            ['name' => 'Sains', 'slug' => 'sains'],
            ['name' => 'Sejarah', 'slug' => 'sejarah'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }

        // Run BookSeeder
        $this->call(BookSeeder::class);
    }
}
