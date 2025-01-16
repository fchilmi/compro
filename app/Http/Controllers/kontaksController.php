<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class kontaksController extends Controller
{
    public function updateProfil(Request $request, string $id)
    {
        $cari = profil::find($id);

        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'alamatToko' => 'required',
            'alamatGudang' => 'required',
            'deskripsi' => 'required',
        ]);
        $cari->update([
            'namaPerusahaan' => $request->nama_perusahaan,
            'alamatToko' => $request->alamatToko,
            'alamatGudang' => $request->alamatGudang,
            'deskripsiPerusahaan' => $request->deskripsi,
        ]);

        return redirect()->route('profilPerusahaan')->with('sukses', 'Deskripsi berhasil diupdate');
    }
    public function updateGambar(Request $request)
    {
        $gambar = profil::first();
        $validator = Validator::make($request->all(), [
            'files1' => 'mimetypes:image/jpeg,image/jpg,image/png|max:5120',
            'files2' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png|max:5120',
            'files3' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png|max:5120'
        ]);
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('profilPerusahaan')->with('gagal', 'Data gagal diupdate, periksa ulang data');
        }

        // Proses update gambar
        if ($request->hasFile('files1')) {
            // Hapus gambar lama jika ada
            if (isset($gambar->GambarPerusahaan1)) {
                File::delete('img/' . $gambar->GambarPerusahaan1);
            }
            // Upload gambar baru
            $file1 = $request->file('files1');
            $namaGambar1 = Str::random(10) . $file1->getClientOriginalName();
            $file1->move(public_path('img'), $namaGambar1);
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
                File::delete('img/' . $gambar->GambarPerusahaan2);
            }
            // Upload gambar baru
            $file2 = $request->file('files2');
            $namaGambar2 = Str::random(10) . $file2->getClientOriginalName();
            $file2->move(public_path('img'), $namaGambar2);

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
                File::delete('img/' . $gambar->GambarPerusahaan3);
            }
            // Upload gambar baru
            $file3 = $request->file('files3');
            $namaGambar3 = Str::random(10) . $file3->getClientOriginalName();
            $file3->move(public_path('img'), $namaGambar3);

            // Update database
            if (isset($gambar->GambarPerusahaan3)) {
                $gambar->GambarPerusahaan3 = $namaGambar3;
                $gambar->save();
            } else {
                $gambar->GambarPerusahaan3 = $namaGambar3;
                $gambar->save();
            }
        }
        return redirect()->route('profilPerusahaan')->with('sukses', 'Gambar perusahaan berhasil diupdate');
    }
    public function addKontak(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor' => 'required|unique:kontaks,nomor',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('user/kontak')->with('gagal', 'Kontak gagal ditambahkan, periksa ulang data');
        }
        kontak::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);
        return redirect()->route('user/kontak')->with('sukses', 'Kontak berhasil ditambahkan');
    }
    public function updateKontak(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('user/kontak')->with('gagal', 'Kontak gagal diupdate, periksa ulang data');
        }
        $data = kontak::find($id);
        $data->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);
        return redirect()->route('user/kontak')->with('sukses', 'Kontak berhasil diupdate');
    }
}
