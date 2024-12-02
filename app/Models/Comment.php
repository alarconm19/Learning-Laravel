<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['message', 'votes_count', 'creator_id', 'post_id', 'comment_father_id'];

    // Define the relationship with the user (creator of the comment)
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // Define the relationship with the post (a comment belongs to a post)
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // Define the relationship with the parent comment (for threaded comments)
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'comment_father_id');
    }

    // Define the relationship with comment likes
    public function likes()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }
}
