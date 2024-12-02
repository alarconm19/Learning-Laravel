<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'vote'];

    // Define the relationship with the user (who liked the post)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the post (which post is liked)
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
