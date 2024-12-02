<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'message', 'votes_count', 'thread_id', 'creator_id'];

    // Define the relationship with the thread (a post belongs to one thread)
    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }

    // Define the relationship with the user (creator of the post)
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // Define the relationship with comments (a post can have many comments)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    // Define the relationship with likes (a post can have many likes)
    public function likes()
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }
}
