<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'subjet', 'description', 'creator_id'];

    // Define the relationship with the user (creator)
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // Define the relationship with posts (a thread can have many posts)
    public function posts()
    {
        return $this->hasMany(Post::class, 'thread_id');
    }

    // Define the relationship with moderators (many-to-many via `moderate` table)
    public function moderators()
    {
        return $this->belongsToMany(User::class, 'moderate', 'thread_id', 'mod_id');
    }
}
