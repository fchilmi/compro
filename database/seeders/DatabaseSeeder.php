<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\kontak;
use App\Models\produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([CategorySeeder::class, UserSeeder::class, produkSeeder::class, GambarSeeder::class, kontakSeeder::class, profilSeeder::class]);
        // Post::factory(100)->recycle([
        //     Category::all(),
        //     User::all()
        // ])->create();
        // produk::factory(10)->recycle([
        //     Category::all()
        // ])->create();
    }
}
