<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Menampilkan halaman daftar post.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    /**
     * Menampilkan halaman form untuk membuat post baru.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Menampilkan halaman form untuk mengedit post.
     *
     * @param  Post  $post
     * @return Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    /**
     * Mengupdate post yang sudah ada.
     *
     * @param  PostRequest  $request
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('posts.index');
    }

    /**
     * Menampilkan halaman detail post.
     *
     * @param  Post  $post
     * @return Response
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    /**
     * Menyimpan post baru ke database.
     *
     * @param  PostRequest  $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        Post::create($request->validated());
        return redirect()->route('posts.index');
    }

    /**
     * Menghapus post.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
