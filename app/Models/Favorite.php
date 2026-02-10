<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Pivot
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function link() {
        return $this->belongsTo(Link::class);
    }
}
