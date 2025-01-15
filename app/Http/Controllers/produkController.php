<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Gambar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function dataProduk(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return datatables()->of($users)->make(true);
        }

        return view('user/dataProduk', compact('request'));
    }

    public function index()
    {

        // $produkTambahan = produk::inRandomOrder()->limit('3')->get();
        // dd($produkTambahan);
        $data = [
            'produks' => produk::whereNotNull('id')->first()->paginate(15),
        ];
        return view('user/dataProduk', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'hasilProduk' => produk::find($id),
            'hasilGambar' => Gambar::where('idProduk', $id)->get(),
            'hasilVideo' => Produk::where('id', $id)->get(),
            'file'  => count(Gambar::where('idProduk', $id)->get())
        ];
        // dd($data);

        return view('/user/editProduk', $data);
    }

    public function addProduks(Request $request)
    {
        $produk = new produk();
        $fileNames = [];
        // dd($request->file('produkImg'));

        $validator = Validator::make($request->all(), [
            'produkName' => 'required|regex:/^[a-zA-Z0-9\ \-\/]+$/',
            'produkPrice' => 'required',
            'produkKategori' => 'required',
            'produkDeskripsi' => 'required',
            'produkImg.*' => 'required|mimetypes:image/jpeg,image/jpg,image/png|max:2560',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('produkHome')->with('gagal', 'Produk gagal ditambahkan, periksa ulang data');
        }
        // Validation passed, store the data in the database
        $namaGambarnya = Str::random(10) . $request->file('produkImg')[0]->getClientOriginalName();
        $data = [
            'namaProduk' => $request->produkName,
            'slug' => Str::slug($request->produkName),
            'hargaProduk' => $request->produkPrice,
            'category_id' => $request->produkKategori,
            'deskripsiProduk' => $request->produkDeskripsi,
            'namaGambar' => $namaGambarnya
        ];
        produk::create($data);
        $produkId = $produk->latest()->first()->id;
        $file = $request->file('produkImg')[0];
        $gambar = new Gambar();
        $gambar->idProduk = $produkId;
        $gambar->namaGambar = $namaGambarnya;
        $gambar->save();
        $file->move(public_path('uploads'), $namaGambarnya);

        // Proses update gambar
        if (count($request->file('produkImg')) == 2) {
            // Upload gambar baru
            $file1 = $request->file('produkImg')[1];
            $namaGambar1 = Str::random(10) . $file1->getClientOriginalName();
            // Update database
            Gambar::create(['idProduk' => $produkId, 'namaGambar' => $namaGambar1]);
            $file1->move(public_path('uploads'), $namaGambar1);
        }
        if (count($request->file('produkImg')) == 3) {
            // Upload gambar baru
            $file2 = $request->file('produkImg')[2];
            $namaGambar2 = Str::random(10) . $file2->getClientOriginalName();
            // Update database
            Gambar::create(['idProduk' => $produkId, 'namaGambar' => $namaGambar2]);
            $file2->move(public_path('uploads'), $namaGambar2);
        }
        return redirect()->route('produkHome')->with('produk', 'Produk berhasil ditambahkan');
    }

    public function updateProduk(Request $request, string $id)
    {
        $produk = produk::find($id);
        // $gambar = Gambar::select('namaGambar')->where('idProduk', $id)->get();
        // $fileNames = [];
        // $coba = $request->coba;
        $validator = Validator::make($request->all(), [
            'produkName' => 'required|regex:/^[a-zA-Z0-9\ \-\/]+$/',
            'produkPrice' => 'required', // Ensure price is numeric
            'produkKategori' => 'required',
            'produkDeskripsi' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('produkHome')->with('gagal', 'Produk gagal diupdate, periksa ulang data');
        }

        $data = [
            'namaProduk' => $request->produkName,
            'slug' => Str::slug($request->produkName),
            'hargaProduk' => $request->produkPrice,
            'category_id' => $request->produkKategori,
            'deskripsiProduk' => $request->produkDeskripsi
        ];

        $produk->update($data);
        return redirect()->route('produkHome')->with('produk', 'Produk berhasil diupdate');
    }
    public function updateProdukGambar(Request $request, string $id)
    {
        $produk = produk::find($id);
        $gambarLama = Gambar::where('idProduk', $id)->get();
        // Validasi input gambar jika ada
        $validGbr = Validator::make($request->all(), [
            'produkImg1' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png|max:2560',
            'produkImg2' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png|max:2560',
            'produkImg3' => 'nullable|mimetypes:video/mp4,video/mkv|max:10240'
        ]);

        // Check if validation fails
        if ($validGbr->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('produkHome')->with('gagal', 'Produk gagal diupdate, periksa ulang tipe file');
        }

        // Proses update gambar
        if ($request->hasFile('produkImg1')) {
            // Hapus gambar lama jika ada
            if (isset($gambarLama[0])) {
                // Storage::delete(public_path('uploads') . '/' . $gambarLama[0]->namaGambar);
                File::delete(public_path('uploads/' . $gambarLama[0]->namaGambar));
            }
            // Upload gambar baru
            $file1 = $request->file('produkImg1');
            $namaGambar1 = Str::random(10) . $file1->getClientOriginalName();
            $file1->move(public_path('uploads'), $namaGambar1);

            // Update database
            if (isset($gambarLama[0])) {
                $gambarLama[0]->namaGambar = $namaGambar1;
                $gambarLama[0]->save();
            } else {
                Gambar::create(['idProduk' => $id, 'namaGambar' => $namaGambar1]);
            }
        }

        if ($request->hasFile('produkImg2')) {
            // Hapus gambar lama jika ada
            if (isset($gambarLama[1])) {
                // dd($gambarLama[1]->namaGambar, Storage::exists('uploads') . $gambarLama[1]->namaGambar);
                File::delete(public_path('uploads/' . $gambarLama[1]->namaGambar));
            }
            // Upload gambar baru
            $file2 = $request->file('produkImg2');
            $namaGambar2 = Str::random(10) . $file2->getClientOriginalName();
            $file2->move(public_path('uploads'), $namaGambar2);

            // Update database
            if (isset($gambarLama[1])) {
                $gambarLama[1]->namaGambar = $namaGambar2;
                $gambarLama[1]->save();
            } else {
                Gambar::create(['idProduk' => $id, 'namaGambar' => $namaGambar2]);
            }
        }

        if ($request->hasFile('produkImg3')) {
            // Hapus gambar lama jika ada
            if (isset($produk->namaVideo)) {
                // Storage::delete(public_path('uploads') . '/' . $gambarLama[2]->namaGambar);
                File::delete(public_path('uploads/' . $produk->namaVideo));
            }
            // Upload gambar baru
            $file3 = $request->file('produkImg3');
            $namaGambar3 = Str::random(10) . $file3->getClientOriginalName();
            $file3->move(public_path('uploads'), $namaGambar3);

            // Update database
            if (isset($produk->namaVideo)) {
                $produk->namaVideo = $namaGambar3;
                $produk->save();
            } else {
                $produk->update(['namaVideo' => $namaGambar3]);
            }
        }

        // Update informasi produk lainnya
        if ($request->hasFile('produkImg1')) {
            $produk->update([
                'namaGambar' => $namaGambar1,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('produkHome')->with('produk', 'Produk berhasil diupdate');
    }
    public function destroy($id)
    {
        $gambar = Gambar::all();
        $produk = produk::find($id);
        // if ($produk->namaGambar) {
        // }
        foreach ($gambar as $g) {
            if ($g->idProduk == $id) {
                $filePath = public_path('uploads') . '/' . $produk->namaGambar;
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $g->delete();
            }
        }
        $produk->delete();
        return redirect()->route('produkHome')->with('produk', 'Produk berhasil dihapus');
    }
}
