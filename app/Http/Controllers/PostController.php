<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
        
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $newPost = Post::create($data);

        return redirect(route('post.index'));

    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $post->update($data);

        return redirect(route('post.index'))->with('success', 'Post Updated Succesffully');

    }

    public function destroy(Post $post){
        $post->delete();
        return redirect(route('post.index'))->with('success', 'Post deleted Succesffully');
    }
}