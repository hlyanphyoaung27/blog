<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id) {
        $data = Article::all();

        return view('articles.like', [
            'likes' => $data
        ]);
    }
}