<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Saga Sosmed</title>
    <link rel="stylesheet" href="/themes/plugins/bs5/bootstrap.min.css">
    <script src="/themes/plugins/bs5/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Saga Apps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Browse By Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('homepage', ['category' => $category->slug])}}">{{ $category->name }}</a>
                            </li>
                        @empty
                            <li>
                                <a class="dropdown-item disabled">No Categories Found</a>
                            </li>
                        @endforelse
                    </ul>
                </li>
            </ul>
            @if(!Auth::check())
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="mx-1 btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="mx-1 btn btn-success">Register</a>
                </div>
            @else
                <div class="d-flex align-items-center">
                    <div class="image mx-1">
                        <img src="{{ auth()->user()->avatar }}" class="img-thumbnail rounded-circle"
                             style="max-width: 50px" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block text-decoration-none">{{ auth()->user()->name }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>

<div class="container my-3">
    @if(Request::segment(1))
        <h3>Showing Articles With Slug: {{ Request::segment(1) }}</h3>
    @endif
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
        @foreach($articles as $article)
            <div class="col">
                <div class="card h-100">
                    <img src="{{$article->banner}}" class="card-img-top" alt="...">
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
                        <small class="text-muted">Created at {{$article->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
