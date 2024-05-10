<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('comment','user')->paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }
    
    public function create()
    {
        $users=User::orderBy('name','asc')->get();
        return view('posts.create',['users'=>$users]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rule for image
        ]);

        $image = 'storage/' . $request->file('image')->store('images', 'public');
        $newPost = new Post;
        $newPost->name = $data['name'];
        $newPost->description = $data['description'];
        $newPost->user_id = $data['user_id'];
        $newPost->image = $image;
        $newPost->save();
        session()->flash('message', 'Post Created');
        return redirect()->route('post.index');
    }
    
    public function update(Post $post, Request $request)
    {
     
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

       
        $post->update($data);
    
        return redirect(route('post.index'))->with('success', 'Post Updated Successfully!');
    }

    public function edit(Post $post){
        if(auth()->id()  !== $post->user_id)
        {
            abort(404,"You are not authorised!!");
        }
        return view('posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post){
        if(auth()->id()  !== $post->user_id)
        {
            abort(404,"You are not authorised!!");
        }
       
        $post->delete();
        return redirect(route('post.index'))->with('success', 'Post deleted Succesfully!!!!');
    }
}