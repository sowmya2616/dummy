<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
        'description'
    ];

    use HasFactory;
    public function User()
    {
       return $this->belongsTo(User::class);
    }

    public function Comment()
    {
       return $this->hasMany(Comment::class);
    }
}