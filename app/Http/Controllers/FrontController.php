<?php

namespace App\Http\Controllers;


use Inertia\Response;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FrontController extends Controller
{
    /**
     * Menampilkan halaman daftar post.
     *
     * @return Response
     */
    public function index()
    {
        // Mengambil data post dengan kategori 'slider' dari database
        $slider = Post::where('kategori', 'slider')->first();

        // Mengambil data post dengan kategori 'about' dari database
        $about = Post::where('kategori', 'about')->first();

        // Mengambil data post dengan kategori 'skill' dari database
        $skill = Post::where('kategori', 'skill')->get();

        // Menggabungkan data post ke dalam array $data
        $data = array(
            'slider' => $slider,
            'about' => $about,
            'skill' => $skill,
             // Menentukan apakah opsi login tersedia dengan memeriksa rute 'login'
            'canLogin' => Route::has('login'),
            
            // Menentukan apakah opsi registrasi tersedia dengan memeriksa rute 'register'
            'canRegister' => Route::has('register'),
            
            // Menyertakan versi Laravel saat ini
            'laravelVersion' => '10',
            
            // Menyertakan versi PHP saat ini
            'phpVersion' => PHP_VERSION,
        );

        // Merender halaman 'Posts/Index' menggunakan Inertia dengan mengirimkan data post
        return Inertia::render('Front/Index', $data);
    }
}
