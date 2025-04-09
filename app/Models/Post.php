<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['username', 'email']);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    // has the user liked the post?
    public function checkLike(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    protected static function booted()
    {
        static::deleting(function ($post) {

            if (Storage::disk('public')->exists('uploads/' . $post->image_path)) {
                Storage::disk('public')->delete('uploads/' . $post->image_path);
            }
        });
    }
}
