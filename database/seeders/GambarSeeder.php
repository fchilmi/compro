<?php

namespace Database\Seeders;

use App\Models\Gambar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gambar::create([
            'namaGambar' => '3QKpLT8ZcCfotoweb-Marley.png',
            'idProduk' => '1',
        ]);
        Gambar::create([
            'namaGambar' => 'gtfTjDBNw6fotoweb-Liang Chi.png',
            'idProduk' => '2',
        ]);
    }
}
