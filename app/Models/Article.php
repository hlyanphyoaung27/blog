<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // public function profile() {
    //     return $this->belongsTo('App\Models\Image');
    // }
}   
