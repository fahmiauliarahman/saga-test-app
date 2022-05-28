@extends('layouts.main')

@section('content')
    <div class="text-center">
        <img src="{{$article->banner}}" alt="Banner Image" style="max-height: 400px; background-size: cover">
    </div>

    <div class="container my-3">
        <h3>{{$article->title}}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <small class="text-muted">Created by {{$article->author->name}} on {{$article->created_at}}</small>
            </div>
            <div class="col-sm-12 col-md-4">
                <small class="text-muted">Category: {{ $article->category->name }}</small>
            </div>
        </div>

        <div class="my-3">
            <p>{{$article->content}}</p>
        </div>

        <div class="d-grid gap-2">
            <a href="{{url('/')}}" class="btn btn-primary">Back to main menu</a>
        </div>
    </div>
@endsection
