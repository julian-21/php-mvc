<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
        $this->middleware('role:admin,author'); 
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => Auth::user()->username,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit($idpost)
    {
        $post = Post::findOrFail($idpost);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $idpost)
    {
        $post = Post::findOrFail($idpost);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


    public function destroy($idpost)
    {
        $post = Post::findOrFail($idpost);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
