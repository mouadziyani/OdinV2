<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'url',
        'user_id',
    ];
    // Owner of the link
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Users with this link is shared
    public function sharedWith() {
        return $this->belongsToMany(User::class, 'link_user')
                    ->withPivot('permission')
                    ->withTimestamps();
    }

    // Users who marked this link as favorite
    public function favoritedBy() {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // Activity logs related to this link
    public function activityLogs() {
        return $this->hasMany(ActivityLog::class);
    }
}
