<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Relasi ke followers
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    // Relasi ke following
    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    // Cek apakah pengguna mengikuti pengguna lain
    public function isFollowing($userId)
    {
        return Follow::where('follower_id', $this->id)
                    ->where('following_id', $userId)
                    ->exists();
    }
}
