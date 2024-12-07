@extends('layouts.app')
@section('content')
<div class="container w-75">
        {{$articles->links()}}
        @if (session('info'))
            <div class="alert alert-warning">
                {{session('info')}}
            </div>
        @endif
        @if (session('alert'))
            <div class="alert alert-success">
                {{session('alert')}}
            </div>
        @endif
        <div class="">
            @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                      
                       <div class="d-flex">
                         <img src="{{$article->user->profile->images}}" alt="" style=" height: 50px; width: 50px; border-radius: 50%">
                         <div>
                    
                            <b class="ms-2">{{$article->user->name}}</b>
                          
                          <p class="ms-2">{{$article->created_at->diffForHumans()}}</p>
                        </div>
                        </div>
                        
                        <h5 class="mt-2">
                            {{$article->title}}
                        </h5>
                        <div class="card-subtitle small text-muted">
                            <span class="text-success">Category:{{$article->category->name}}</span>
                            <span class="ms-1 ">Comment:{{count($article->comments)}}</span>
                            
                        </div>
                        <p class="card-text mt-2">
                            {{$article->body}}
                            
                        </p>
                    </div>
                    <a href="{{url("/articles/detail/$article->id")}}" class="btn btn-sm btn-outline-info rounded-3">
                        View Detail
                     </a>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection
    
                
