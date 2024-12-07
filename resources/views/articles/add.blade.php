@extends('layouts.app')
@section('content')
    <div class="container w-50">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post">
            @csrf
            <div class="mb-2">
                <label class="mb-1">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-2">
                <label class="mb-1">Content</label>
                <textarea type="text" name="body" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label class="mb-1">Category</label>
                <select name="category_id" class="form-select mb-3">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">
                            {{$category['name']}}
                        </option>
                    @endforeach
                </select>
                <input type="submit" value="Add Article" 
                class="btn btn-info">
            </div>
        </form>
    </div>
@endsection