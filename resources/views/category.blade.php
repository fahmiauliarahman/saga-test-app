@extends('layouts.main')
@section('content')
    @if(Request::segment(1))
        <h3>Showing Articles With Slug: {{ Request::segment(1) }}</h3>
    @else
        <h3>Showing 5 Latest Article</h3>
    @endif
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
        @foreach($articles as $article)
            <div class="col">
                <div class="card h-100">
                    <img src="{{$article->banner}}" class="card-img-top" alt="Image Thumbnail">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="text-muted"><small>by {{ $article->author->name }}</small></p>
                        <p class="card-text">
                            {{ substr(strip_tags($article->content), 0, 50) }}
                            @if(strlen(strip_tags($article->content)) > 50)
                                ...<a href="#">Read More</a>
                            @endif
                        </p>
                        <a href="{{ route('article.detail', ['category' => $article->category->slug, 'article' => $article->slug]) }}"
                           class="stretched-link"></a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Created at {{$article->created_at}} on
                            category {{ $article->category->name }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
