<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static count()
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
    const ROLE_REDACTOR = 2;
    const ROLE_WRITER = 3;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_READER => 'Reader',
            self::ROLE_REDACTOR => 'Redactor',
            self::ROLE_WRITER => 'Writer',
        ];
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {

    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function postRelatedComments()
    {
        return $this->posts()->with('comments');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
