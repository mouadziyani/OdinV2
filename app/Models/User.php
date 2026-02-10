<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    // Roles (Many-to-Many)
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    // Links created by user (One-to-Many)
    public function links() {
        return $this->hasMany(Link::class);
    }

    // Favorites (Many-to-Many)
    public function favorites() {
        return $this->belongsToMany(Link::class, 'favorites');
    }

    // Links shared with user (Many-to-Many with pivot permission)
    public function sharedLinks() {
        return $this->belongsToMany(Link::class, 'link_user')
                    ->withPivot('permission')
                    ->withTimestamps();
    }
}
