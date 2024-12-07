<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index() {
        $data = Article::latest()->paginate(5);
        $user = Auth::user();

        return view('articles.index',[
            'articles' => $data,
            'user' => $user
        ]);
    }

    public function detail($id) {
        $data = Article::find($id);
        $user = $data->user;
        

        return view('articles.detail',[
            'article' => $data,
            'user' => $user,
            'profile' => $user->profile, 
        ]);
    }

    public function add() {
        $data = Category::all();
        return view('articles.add',[
            'categories' => $data
        ]);
    }

    public function create(){

        $validator = validator(request()->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request() ->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles')->with('alert','Article has been created!');
    }

    public function edit($id){
        $validator = validator(request()->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request() ->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles')->with('alert','Article has been updated!');
    }

    public function delete($id) {
        $article = Article::find($id);
        $article -> delete();

        return redirect('/articles')->with('info', 'Article has been deleted!');
    }

    public function like($id) {
        $data = Article::find($id);
        
        return view('articles.like', [
            'article' => $data ,
        ]);
    }

   
}





