<?php

use App\Http\Controllers\kontaksController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use App\Models\kontak;
use App\Models\Post;
use App\Models\produk;
use App\Models\profil;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/user/dashboard', ['produks' => produk::all()->first()->paginate(9)]);
});
Route::get('/posts', [UsersController::class, 'cobaUser'])->name('postss');
// Route::get('/server', [UsersController::class, 'cobaUser'])->name('server');
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::find($slug);
    return view('post', ['title' => 'Single Post', 'titles' => 'Halaman Post', 'post' => $post]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => ' Articles in ' . $category->name, 'titles' => 'Halaman Post', 'posts' => $category->posts]);
});



//USERS FITUR
Route::get('/user/login', [UsersController::class, 'login'])->name('users.login')->middleware('guest');
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UsersController::class, 'auth_login'])->middleware('guest');
Route::post('/user/login', [UsersController::class, 'auth_login'])->middleware('guest');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout2', [UsersController::class, 'logout'])->name('logout2');
//Add
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
//delete
Route::delete('/users/{id}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');
//edit update
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');
//all admin & guest
Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('auth');


//Produk guest
Route::get('/user/dashboard', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();
    // $posts = Post::all();
    // return view('/user/dashboard', ['name' => 'Sandi Rp', 'title' => 'Blog', 'titles' => 'Halaman Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString()]);
    return view('/user/dashboard', ['produks' => produk::filter(request(['search', 'category']))->latest()->paginate()->withQueryString()]);
})->name('dashboard');
//Detail produk
Route::get('/user/detail/{produk:slug}', function (Produk $produk) {
    return view('user/detail', ['kontaks' => kontak::all(), 'produk' => $produk, 'produkKategori' => produk::inRandomOrder()->limit('4')->get()]);
});

//Page Produk
Route::get('/user/dataproduk', [produkController::class, 'index'])->name('produkHome')->middleware('auth');
Route::post('/addProduk', [produkController::class, 'addProduks'])->name('produkAdd')->middleware('auth');
Route::put('/updateProduk/{id}', [produkController::class, 'updateProduk'])->name('produkUpdate')->middleware('auth');
Route::put('/updateProdukGambar/{id}', [produkController::class, 'updateProdukGambar'])->name('produkUpdateGambar')->middleware('auth');
Route::delete('/produk/{id}/destroy', [produkController::class, 'destroy'])->name('produkDestroy')->middleware('auth');
Route::get('/produk/{id}/edit', [produkController::class, 'edit'])->name('produksEdit')->middleware('auth');

Route::get('/user/addproduk', function () {
    return view('user/addProduk', ['produks' => produk::all()]);
})->name('cobaNambah')->middleware('auth');

//Page Profil
Route::get('/user/profilperusahaan', function () {
    return view('user/profilPerusahaan', ['profil' => profil::first()]);
})->name('profilPerusahaan');
Route::get('/profil/edit', function () {
    return view('user/editProfil', ['profil' => profil::first()]);
})->name('editProfil')->middleware('auth');
Route::put('/user/updateProfil/{id}', [kontaksController::class, 'updateProfil'])->name('updateProfil')->middleware('auth')->middleware('auth');
Route::put('/user/updateGambar/{id}', [kontaksController::class, 'updateGambar'])->name('updateGambar')->middleware('auth')->middleware('auth');

//Page kontak
Route::get('/user/kontak', function () {
    return view('user/kontak', ['kontaks' => kontak::all()]);
})->name('user/kontak')->middleware('auth');
Route::post('/addKontak', [kontaksController::class, 'addKontak'])->name('addKontak')->middleware('auth');
Route::put('/user/updateKontak/{id}', [kontaksController::class, 'updateKontak'])->name('updateKontak')->middleware('auth');
