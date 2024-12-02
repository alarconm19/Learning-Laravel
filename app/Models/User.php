<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    const ROLES = ['user', 'mod'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Define a scope for role-based queries
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // Define the relationship with threads (user can create many threads)
    public function threads()
    {
        return $this->hasMany(Thread::class, 'creator_id');
    }

    // Define the relationship with posts (user can create many posts)
    public function posts()
    {
        return $this->hasMany(Post::class, 'creator_id');
    }

    // Define the relationship with comments (user can create many comments)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'creator_id');
    }

    // Define the relationship with post likes
    public function postLikes()
    {
        return $this->hasMany(PostLike::class, 'user_id');
    }

    // Define the relationship with comment likes
    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class, 'user_id');
    }
}
