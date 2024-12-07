@extends('layouts.app')
@section('content')

<div class="container w-75">
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
            <div class="d-flex mt-3">
              <a href="{{url("/articles/like/$article->id")}}" class="btn btn-info btn-sm position-relative">
                Like
                <span  class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{count($article->likes)}}
                </span>
              </a>
              <button class="btn btn-primary btn-sm ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#comment" aria-expanded="false" aria-controls="comment">
                Comments
              </button>
              <div class="dropdown ms-2">
                <a href="" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                  Edit
                </a>
                <ul class="dropdown-menu">
                  <li >
                    <a href="{{url("/articles/edit/$article->id")}}" class="dropdown-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg>
                      <span class="ms-2">Update</span>
                    </a>
                  </li>
                  <li >
                    <a href="{{url("/articles/delete/$article->id")}}" class="dropdown-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                      <span class="ms-2">Delete</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
        </div>
    </div>

    
      <form action="{{url("/comments/add")}}" method="post" class="mb-3 collapse" id="comment">
        @csrf
          <input type="hidden" name="article_id" value="{{$article->id}}">
          <div class="d-flex ">
            <textarea name="content" placeholder="Write a comment" class="form-control"></textarea>
           
              <button class="btn btn-sm btn-outline-info ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                </svg>
            </button>
            
          </div>
      </form>
   
    
    <div >
      <ul class="list-group">
        <li class="list-group-item">
          <h5>Comments
            <span class="badge text-bg-primary badge-sm">
                {{count($article->comments)}}
            </span>
          </h5>
        </li>
        @foreach ($article->comments as $comment)
            <li class="list-group-item mb-3">
                <h6 class="mb-2 text-secondary">
                  Commented by - {{$comment->user->name}}
                  <span class="ms-3">{{$comment->created_at->diffForHumans()}}</span>
                </h6>
                {{$comment->content}} 
                
                  <div class=" mb-2 mt-2">
                    {{-- Like --}}
                      <a href="" class="btn btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up fw-bold text-secondary" viewBox="0 0 16 16">
                          <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                        </svg>
                      </a>

                      {{-- Reply --}}
                      <a href="" class="btn btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-reply fw-bold ms-2 text-secondary " viewBox="0 0 16 16">
                          <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"/>
                        </svg>
                      </a>
                      
                      {{-- Comment --}}
                    
                      <a href="{{url("/comments/delete/$comment->id")}}" class= "btn btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3 ms-2 text-secondary" viewBox="0 0 16 16">
                          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                      </a>
                  </div>
                
                 
                  
            </li>
        @endforeach
      </ul>
    </div>
</div>
@endsection
    



            
               