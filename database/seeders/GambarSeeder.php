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
            'namaGambar' => 'EBcSVhdRhifotoweb-Nihon Spindle.png',
            'idProduk' => '1',
        ]);
        Gambar::create([
            'namaGambar' => 'DxLvPXyWBsfotoweb-Shinwa.png',
            'idProduk' => '2',
        ]);
    }
}
