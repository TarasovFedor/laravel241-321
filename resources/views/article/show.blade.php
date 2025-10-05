@extends('layout')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
@endif

<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title text-center ">{{$article->title}}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$article->publish_date}}</h6>
        <p class="card-text">{{$article->text}}</p>
        @can('create')
        <div class="btn-toolbar mt-3" role="toolbar">
            <a href="/article/{{$article->id}}/edit" class="btn btn-primary me-3">Edit article</a>
            <form action="/article/{{$article->id}}" method="post">
                @METHOD("DELETE")
                @CSRF
                <button type="submit" class="btn btn-warning me-3">Delete article</button>
            </form>
        </div>
        @endcan
    </div>
</div>

<div class='comments'>
    @include('comment.comments', ['comments' => $article -> comments, 'article' => $article])
</div>
@endsection