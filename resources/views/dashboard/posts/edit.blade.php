@extends('dashboard.layouts.main')
@push('addon-style')
    <link rel="stylesheet" type="text/css" href="{{ url('css/trix.css') }}">
    <script type="text/javascript" src="{{ url('js/trix.js') }}"></script>
@endpush
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Posts</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror" required autofocus id="title" placeholder="Title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" value="{{ old('slug', $post->slug) }}" name="slug" class="form-control @error('slug') is-invalid @enderror" required id="slug" placeholder="slug made automatic">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" required name="category_id" id="category">
                        <option disabled selected>Chose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ( old('category_id', $post->category_id) == $category->id) ?  'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" onchange="previewImage()" id="image" >
                        <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    @if ($post->image)
                        <img class="img-preview img-fluid col-sm-3" src="{{ asset($post->image) }}">
                    @else
                        <img class="img-preview img-fluid col-sm-3">
                    @endif
                    @error('image')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    @error('body')
                            <p class="text-danger">{{ $message }}</p> 
                    @enderror
                    <input type="hidden" value="{{ old('body', $post->body) }}" name="body" class="form-control" id="body" placeholder="Body">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                imgPreview.alt = 'preview';
            }
        }
    </script>
@endpush