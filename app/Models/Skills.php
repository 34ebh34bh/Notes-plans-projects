<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
