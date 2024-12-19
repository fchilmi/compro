<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('users', $data);
    }
    public function create()
    {
        return view('user/create');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => 'user-' . $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users');
    }

    public function login()
    {
        return view('user/login');
    }

    public function auth_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        $get = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($get)) {
            return redirect()->intended('user/dashboard');
        } else {
            return redirect()->back()->withErrors('Username atau Password Tidak Sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['cari'] = User::find($id);
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $password = $request->password;
        if (empty($password)) {
            $cari = User::find($id);
            $cari->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $cari = User::find($id);
            $cari->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cari = User::find($id);
        // dd($cari);
        $cari->delete();
        return redirect()->route('users');
    }

    // 'name' => $request->name,
    //         'username' => 'user-' . $request->name,
    //         'email' => $request->email,

    public function beran()
    {
        $post = User::all();
        // dd($post->name);
        return view('posts', $post);
    }
    public function cobaUser(Request $request)
    {
        // dd(User::all());
        // $data = produk::all();
        // if ($request->ajax()) {
        //     return DataTables::of($data)
        //         ->addColumn('nama', function ($data) {
        //             return $data->namaProduk;
        //         })
        //         ->addColumn('harga', function ($data) {
        //             return $data->hargaProduk;
        //         })
        //         ->addColumn('deskripsi', function ($data) {
        //             return Str::of($data->deskripsiProduk)->limit(50);
        //         })
        //         ->addColumn('action', function ($data) {
        //             return '<a href="#" class="btn btn-primary"><i class="fas fa-pen"></i> Ubah</a>
        //             <a data-toggle="modal" data-target="#" class="btn btn-warning"><i class="fas fa-trash"></i> Hapus</a>';
        //         })
        //         ->rawColumns(['foto', 'action'])
        //         ->make(true);
        // }
        // return view('posts', compact('request', 'data'));
    }
}
