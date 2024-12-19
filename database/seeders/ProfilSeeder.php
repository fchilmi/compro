<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\profil;

class profilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        profil::create([
            'namaPerusahaan' => 'PT. Great King Surabaya',
            'alamatToko'    => 'Margomulyo Indah',
            'alamatGudang'  => 'Margomulyo Gudang e',
            'deskripsiPerusahaan' => 'Filler Untuk CrossFlow Cooling Tower merupakan part yang digunakan dalam mesin Cooling Tower yang berfungsi sebagai filter air. Dapat digunakan untuk berbagai merk Cooling Tower seperti Kuken, Liang Chi, dan lainnya. Menggunakan media jenis film PolyVinyl Chloride (PVC) bentuk vakum adalah pilihan hemat biaya yang sangat baik untuk Cooling Tower Anda.

Ketebalan standar untuk filler ini 12 mil (0,30mm sebelum dibentuk). Ketebalan lain juga tersedia berdasarkan permintaan. Filler ini mudah diikat ke dalam kemasan menggunakan perekat PVC.

Spesifikasi :
Bahan - Warna : PVC - Hitam
Ukuran : 800 mm(H) x 750 mm(W)',
            'logoPerusahaan' => 'logo header-01.png',
            'gambarPerusahaan1' => '0YqAryLj9Aweb-background nama pt-06.png',
            'gambarPerusahaan2' => null,
            'gambarPerusahaan3' => null,
        ]);
    }
}
