<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use App\Models\Comment;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('comment','user')->paginate(5);
        return view('post.index',['posts'=> $posts]); 

    }

    public function create()
    {
        $users = User::orderBy('name','asc')->get();
        return view('post.create',['users'=>$users]);
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable', 
            'user_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Adjust the validation rules as needed
        ]);

        
        
        $image='storage/'.$request->file('image')->store('images','public');
        // Create a new post with validated data
        $newPost = new Post;
        $newPost->name=$data['name'];
        $newPost->description=$data['description'];
        $newPost->user_id=$data['user_id'];
        $newPost->image=$image;
        $newPost->save();

        session()->flash('message','Post Created');
        return redirect()->route('post.index');
    }

    public function edit(string $id){
        $post=Post::findOrFail($id);        
        return view('post.edit', compact('post'));
    }

    public function update( Request $request,string $id)
    {
        $post=Post::findOrFail($id);        
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->update();
        
        return redirect(route('post.index'))->with('success', 'Post Updated Succesffully');
    }

    public function destroy($id){
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Post deleted Succesffully');
       
    }
    



}