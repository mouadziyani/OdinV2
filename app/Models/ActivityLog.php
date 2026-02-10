<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'link_id',
        'action',
    ];

    // User who performed the action
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Link on which the action was performed
    public function link() {
        return $this->belongsTo(Link::class);
    }
}
