<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Deskripsi' => 'required|string|max:155',
            'tahun' => 'required',
            'penerbit' => 'required'
        ]);

        $post = Post::create([
            'Deskripsi' => $request->Deskripsi,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
            'harga' => $request->harga
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
