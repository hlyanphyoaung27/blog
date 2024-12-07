<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function user() {
        return $this->belongsTo('App\Models\User'); 
    }
}
