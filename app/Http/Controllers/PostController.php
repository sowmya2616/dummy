<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Validate request data including the image file
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Adjust the validation rules as needed
        ]);
    
        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded file in the storage disk

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
    
            // Move the image to the public/images directory
            $image->move(public_path('images'), $imageName);
    
            // Set the image URL in the $data array
            $data['image'] = 'images/' . $imageName;
        }


        // Create a new post with validated data
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