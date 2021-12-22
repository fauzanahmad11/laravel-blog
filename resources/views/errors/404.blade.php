@extends('errors.layouts.main')
@section('container')
<div class="row justify-content-center align-items-center" style="height: 100vh">
    <div class="col-7 text-center">
        <img src="{{ url('img/404.svg') }}" style="width: 300px" class="img-fluid mb-3" alt="404">
        <h3>Page not found</h3>
        <p>{{ $exception->getMessage() }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
</div>
@endsection