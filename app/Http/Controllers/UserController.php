<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


use Illuminate\Http\Request;

class UserController extends Controller
{
     //
     public function show(string $id){
        $user=User::findOrFail($id);
        return view('users.show',compact('user'));
        
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    

}
