@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-8 text-muted">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <p>By. <a href="/blog/posts?author={{ $post->author->username }}" class="text-decoration-none ty-main">{{ $post->author->name }}</a> in <a class="text-decoration-none ty-main" href="/blog/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            @if ($post->image)
                <img class="img-fluid mt-3" style="width: 100%; height:400px; object-fit: cover; object-position: center;" src="{{ asset($post->image) }}" alt="{{ $post->category->name }}">
            @else
                <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
            @endif
            <article class="my-4">
                {!! $post->body !!}
            </article>
            <a href="/blog/posts" class="link-danger ty-main">kembali</a>
        </div>
    </div>
</div>

@endsection
