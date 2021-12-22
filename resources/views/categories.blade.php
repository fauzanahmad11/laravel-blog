@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Categories</h1>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/blog/posts?category={{ $category->slug }}" class="text-decoration-none text-white category-link">
                        <div class="card bg-dark text-white border-0 shadow mt-4">
                            <img src="https://source.unsplash.com/1200x1200?{{ $category->name }}" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex justify-content-center align-items-center p-0">
                                <h5 class="card-title flex-fill text-overlay text-center m-0 p-4 fs-3">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
