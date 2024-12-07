@extends('layouts.app')
@section('content')
    <div class="container w-75">
        <table class="table ">
            <tr>
                <th>Username</th>
                <th>Time</th>
            </tr>
            @foreach ($article->likes as $like)
                <tr>
                    <td>
                        <img src="{{$like->user->profile->images}}" alt="" style=" height: 40px; width: 40px; border-radius: 50%" class="me-2">
                        {{$like->user->name}}</td>
                    <td>{{$like->user->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection


