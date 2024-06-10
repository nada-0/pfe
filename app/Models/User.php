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
        'priceWork',
        'location',
        'image',
        'rating',
        'phone',
        'bio',
        'notifications_on',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_user');
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function meetups()
    {
        return $this->hasMany(Meetup::class);
    }

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
}
