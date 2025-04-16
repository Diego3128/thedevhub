<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function removeLike(Post $post)
    {
        $this->likes()->where('post_id', $post->id)->delete();
    }
    // other implementation
    // public function followers(): HasMany
    // {
    //     return $this->hasMany(Follower::class, 'user_id', 'id');
    // }
    //other implementation
    // public function following()
    // {
    //     return $this->hasMany(Follower::class, 'follower_id', 'id');
    // }
    // user followers
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }
    // users this user follows
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }
    // checkf if the Auth user is following another user
    public function isFollowing(User $user): bool
    {
        return $this->following()->where('user_id', $user->id)->exists();
    }
}
