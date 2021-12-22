@extends('layouts.main')
@section('container')
    <h1 class="mb-3 text-center ">{{ $title }}</h1>
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="/blog/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control input-dark" value="{{ request('search') }}" placeholder="Search" name="search">
                    <button class="btn btn-y-main" type="submit">serach</button>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
    <div id="carouselthreefirst" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselthreefirst" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselthreefirst" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselthreefirst" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($posts->take(3) as $post)
                <div class="carousel-item @if($loop->first) active @endif">
                    <div class="card mb-5 bg-neumorphism position-relative">
                        @if ($post->image)
                            <img class="card-img-top" style="width: 100%; height:400px; object-fit: cover; object-position: center;" src="{{ asset($post->image) }}" alt="{{ $post->category->name }}">
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" style="width: 100%; height:400px; object-fit: cover; object-position: center;" alt="{{ $post->category->name }}">
                        @endif
                        <div style="height: 80%; width: 100%;" class="card-body text-center position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center justify-content-center">
                            <h5 class="card-title">
                                <a href="/blog/posts/{{ $post->slug }}" class="text-decoration-none text-light">{{ $post->title }}</a>
                            </h5>
                            <div class="d-flex align-items-center my-2 my-md-0">
                                @if ($post->author->image)
                                    <div style="height: 30px; width: 30px; overflow: hidden; border-radius:50%;">
                                        <img style="height: 100%; width: 100%; object-fit: cover; object-position: center;" class="img-fluid" src="{{ asset($post->author->image) }}">
                                    </div>
                                @else
                                    <div style="height: 30px; width: 30px; overflow: hidden; border-radius:50%;">
                                        <img style="height: 100%; width: 100%; object-fit: cover; object-position: center;" class="img-fluid" src="https://source.unsplash.com/500x400?person {{ $post->category->name }}">
                                    </div>
                                    {{-- <i class="bi bi-person-circle fs-4"></i> --}}
                                @endif
                                <small class="ms-2">
                                    <a href="/blog/posts?author={{ $post->author->username }}" class="text-decoration-none ty-main">{{ $post->author->name }}</a> 
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <p class="card-text px-3 mb-4 text-light">{{ $post->excerpt }}</p>
                            <a class="btn btn-y-main" href="/blog/posts/{{ $post->slug }}">Read More...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselthreefirst" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselthreefirst" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($posts->skip(3) as $post)
                <div class="col-md-4 mb-5">
                    <div class="card bg-neumorphism">
                        <div class="category position-absolute text-white">
                            <a class="text-decoration-none text-white d-block px-3 py-2"  style="background-color: rgba(0, 0, 0, .4)" href="/blog/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>

                        @if ($post->image)
                            <img class="card-img-top" style="width: 100%; height:300px; object-fit: cover; object-position: center;" src="{{ asset($post->image) }}" alt="{{ $post->category->name }}">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" style="width: 100%; height:300px; object-fit: cover; object-position: center;" alt="{{ $post->category->name }}">
                        @endif

                        <div class="card-body">
                        <h5 class="card-title" style="min-height: 50px" title="{{ $post->title }}">{{ Str::limit($post->title,55) }}</h5>
                        <div class="d-flex align-items-center">
                            @if ($post->author->image)
                                <div style="height: 30px; width: 30px; overflow: hidden; border-radius:50%;">
                                    <img style="height: 100%; width: 100%; object-fit: cover; object-position: center;" class="img-fluid" src="{{ asset($post->author->image) }}">
                                </div>
                            @else
                                <div style="height: 30px; width: 30px; overflow: hidden; border-radius:50%;">
                                    <img style="height: 100%; width: 100%; object-fit: cover; object-position: center;" class="img-fluid" src="https://source.unsplash.com/500x400?person {{ $post->category->name }}">
                                </div>
                                {{-- <i class="bi bi-person-circle fs-4"></i> --}}
                            @endif
                            <small class="ms-2">
                                <a href="/blog/posts?author={{ $post->author->username }}" class="text-decoration-none ty-main">{{ $post->author->name }}</a> 
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <p class="card-text ">{{ Str::limit($post->excerpt,100) }}</p>
                        <a href="/blog/posts/{{ $post->slug }}" class="btn btn-y-main" data-bs-trigger="hover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $post->excerpt }}">Read More</a>
                        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-4 ">No post found</p>
    @endif
<div class="d-flex justify-content-center">
    {{ $posts->onEachSide(2)->links() }}
</div>
@endsection
@push('addon-script')
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>
@endpush
