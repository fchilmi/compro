<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    // Add a new user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password1' => 'required',
            'password2' => 'required|same:password1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('users')->with('gagal', 'User gagal ditambahkan, periksa ulang data');
        }
        User::create([
            'name' => $request->nama,
            'username' => 'user-' . $request->nama,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password1),
            'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users')->with('berhasil', 'User berhasil ditambahkan');
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

        $user = User::whereRaw('BINARY `name` = ?', [$request->name])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('dashboard');
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



    /**
     * Update a user
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password2' => 'same:password1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and error messages
            return redirect()->route('users')->with('gagal', 'User gagal diupdate, periksa ulang data');
        }
        $password = $request->password;
        if (empty($password)) {
            $cari = User::find($id);
            $cari->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);
        } else {
            $cari = User::find($id);
            $cari->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password1),
            ]);
        }
        return redirect()->route('users')->with('berhasil', 'User berhasil diupdate');
    }

    /**
     * Delete a user
     */
    public function destroy(string $id)
    {
        $cari = User::find($id);
        // dd($cari);
        $cari->delete();
        return redirect()->route('users')->with('berhasil', 'User berhasil dihapus');
    }
    // public function beran()
    // {
    //     $post = User::all();
    //     // dd($post->name);
    //     return view('posts', $post);
    // }
}
