@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <img src="{{$user->profile->images}}" alt="" style="height: 170px; width:170px; border-radius: 50%">
            <h4 class="mt-3 fw-semibold">{{$user->name}}</h4>
            <h6 class="fw-semibold">Join at - {{$user->created_at->format('d-m-Y')}}</h6>
        </div>
        
        <div class="container mt-4 w-75">
            @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                      
                       <div class="d-flex">
                         <img src="{{$user->profile->images}}" alt="" style=" height: 50px; width: 50px; border-radius: 50%">
                         <div>
                          <a class="nav-link" href="{{url("/user/profile/$user->id")}}">
                            <b class="ms-2">{{$article->user->name}}</b>
                          </a>
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