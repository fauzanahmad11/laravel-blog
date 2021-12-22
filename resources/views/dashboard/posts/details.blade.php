@extends('dashboard.layouts.main')
@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Posts</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $post->category->name }}</h6>
        </div>
        <div class="card-body">
            <h2 class="mb-3">{{ $post->title }}</h2>
            
            <a href="/dashboard/posts" class="btn-sm btn-primary"><i class="fas fa-chevron-left"></i> Back to all</a>
            <a href="{{ url("dashboard/posts/$post->slug") }}/edit" class="btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn-sm btn-danger border-0" onclick="return confirm('Are you sure ?')"><i class="fas fa-minus-circle"></i> Delete</button>
            </form>

            @if ($post->image)
                <img class="img-fluid mt-3" style="width: 100%; height:400px; object-fit: cover; object-position: center;" src="{{ asset($post->image) }}" alt="{{ $post->category->name }}">
            @else
                <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
            @endif
            
            <article class="my-4">
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection
@push('addon-script')
    <!-- Page level plugins -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
@endpush