<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class kontaksController extends Controller
{
    public function updateProfil(Request $request, string $id)
    {
        $cari = profil::find($id);
        $cari->update([
            'namaPerusahaan' => $request->nama_perusahaan,
            'alamatToko' => $request->alamatToko,
            'alamatGudang' => $request->alamatGudang,
            'deskripsiPerusahaan' => $request->deskripsi,
        ]);

        return redirect()->route('user/kontak');
    }
    public function updateGambar(Request $request)
    {
        $gambar = profil::first();
        $request->validate([
            'files1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'files2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'files3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses update gambar
        if ($request->hasFile('files1')) {
            // Hapus gambar lama jika ada
            if (isset($gambar->GambarPerusahaan1)) {
                File::delete('uploads/' . $gambar->GambarPerusahaan1);
            }
            // Upload gambar baru
            $file1 = $request->file('files1');
            $namaGambar1 = Str::random(10) . $file1->getClientOriginalName();
            $file1->move(public_path('uploads'), $namaGambar1);

            // Update database
            if (isset($gambar->GambarPerusahaan1)) {
                $gambar->GambarPerusahaan1 = $namaGambar1;
                $gambar->save();
            } else {
                $gambar->GambarPerusahaan1 = $namaGambar1;
                $gambar->save();
            }
        }

        if ($request->hasFile('files2')) {
            // Hapus gambar lama jika ada
            if (isset($gambar->GambarPerusahaan2)) {
                File::delete('uploads/' . $gambar->GambarPerusahaan2);
            }
            // Upload gambar baru
            $file2 = $request->file('files2');
            $namaGambar2 = Str::random(10) . $file2->getClientOriginalName();
            $file2->move(public_path('uploads'), $namaGambar2);

            // Update database
            if (isset($gambar->GambarPerusahaan2)) {
                $gambar->GambarPerusahaan2 = $namaGambar2;
                $gambar->save();
            } else {
                $gambar->GambarPerusahaan2 = $namaGambar2;
                $gambar->save();
            }
        }

        if ($request->hasFile('files3')) {
            // Hapus gambar lama jika ada
            if (isset($gambar->GambarPerusahaan3)) {
                File::delete('uploads/' . $gambar->GambarPerusahaan3);
            }
            // Upload gambar baru
            $file3 = $request->file('files3');
            $namaGambar3 = Str::random(10) . $file3->getClientOriginalName();
            $file3->move(public_path('uploads'), $namaGambar3);

            // Update database
            if (isset($gambar->GambarPerusahaan3)) {
                $gambar->GambarPerusahaan3 = $namaGambar3;
                $gambar->save();
            } else {
                $gambar->GambarPerusahaan3 = $namaGambar3;
                $gambar->save();
            }
        }
        return redirect()->route('profilPerusahaan');
    }
    public function addKontak(Request $request)
    {
        kontak::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);
        return redirect()->route('user/kontak');
    }
    public function updateKontak(Request $request, string $id)
    {
        $data = kontak::find($id);
        $data->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);
        return redirect()->route('user/kontak');
    }
}
