<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderate extends Model
{
    use HasFactory;

    protected $fillable = ['action', 'mod_id', 'thread_id'];

    // Define the relationship with the moderator (user who performed the action)
    public function moderator()
    {
        return $this->belongsTo(User::class, 'mod_id');
    }

    // Define the relationship with the thread (thread being moderated)
    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }
}
