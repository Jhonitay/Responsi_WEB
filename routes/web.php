<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Mengatur rute untuk halaman utama
Route::get('/', function () {
    return Inertia::render('Welcome', [
        // Menentukan apakah opsi login tersedia dengan memeriksa rute 'login'
        'canLogin' => Route::has('login'),
        
        // Menentukan apakah opsi registrasi tersedia dengan memeriksa rute 'register'
        'canRegister' => Route::has('register'),
        
        // Menyertakan versi Laravel saat ini
        'laravelVersion' => Application::VERSION,
        
        // Menyertakan versi PHP saat ini
        'phpVersion' => PHP_VERSION,
    ]);
});

// Mengatur rute untuk halaman dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Mengelompokkan rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk mengedit profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Rute untuk memperbarui profil pengguna
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Rute untuk menghapus profil pengguna
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute untuk sumber daya 'posts' yang terkait dengan PostController
    Route::resource('posts', PostController::class);
});

// Mengimpor rute untuk otentikasi pengguna
require __DIR__.'/auth.php';
