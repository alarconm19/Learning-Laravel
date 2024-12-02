<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id', 'vote'];

    // Define the relationship with the user (who liked the comment)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the comment (which comment is liked)
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
