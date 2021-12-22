@extends('layouts.blank')

@section('container')
    <div style="min-height: 100vh" class="row justify-content-center align-items-center">
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin shadow p-3 mb-5">
                <form action="/login" method="POST">
                    @csrf
                    <img class="mb-4 mx-auto d-block" src="{{ url('/img/logo.svg') }}" alt="logo" width="100">
                    <h1 class="h3 mb-3 fw-normal text-center text-muted">Please login</h1>
                    <div class="form-floating">
                        <input type="email" name="email" required autofocus class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="name@example.com">
                        <label for="email" class="text-muted">Email address</label>
                        @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" required name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password" class="text-muted">Password</label>
                        @error('password') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" value="true" {{ old('remember') ? 'checked' : '' }}> <span class="text-muted">Remember me</span>
                    </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="text-muted d-block text-center mt-5">
                    Not registered yet ? 
                    <a href="/register" class="ty-main text-decoration-none">Create an Account</a>
                </small>
                <small class="d-block text-center mt-1">
                    <a href="/" class="text-decoration-none text-secondary">cancel</a>
                </small>
                <small class="mt-2 mb-3 text-muted d-block text-center">zanzancode &copy; 2021</small>
            </main>
        </div>
    </div>
@endsection