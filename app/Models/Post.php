<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * Ini adalah model untuk entitas Post.
 * Model ini digunakan untuk berinteraksi dengan tabel "posts" di database.
 * Model ini menggunakan trait HasFactory untuk mendukung pembuatan instance model secara mudah.
 */
class Post extends Model
{
    use HasFactory;

    /**
     * Properti yang dapat diisi (fillable) pada model.
     * Properti ini menentukan kolom-kolom yang dapat diisi dalam tabel "posts".
     */
    protected $fillable = [
        'judul', // Judul dari post
        'kategori', // Kategori dari post
        'konten', // Konten dari post
        'penulis', // Penulis dari post
    ];
}
