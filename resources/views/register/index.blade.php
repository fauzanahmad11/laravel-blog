@extends('layouts.blank')

@section('container')
    <div style="min-height: 100vh" class="row justify-content-center align-items-center mt-5">
        <div class="col-lg-6">
            <main class="form-registration shadow p-3 mb-5">
                <form action="/register" method="POST">
                    @csrf
                    <img class="mb-4 mx-auto d-block" src="{{ url('/img/logo.svg') }}" alt="logo" width="100">
                    <h1 class="h3 mb-3 fw-normal text-center text-muted">Registration Form</h1>
                    <div class="form-floating">
                        <input type="text" required class="form-control rounded-0 rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}">
                        <label for="name" class="text-muted">Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" required class="form-control rounded-0 @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                        <label for="username" class="text-muted">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" required class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="email" class="text-muted">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" required class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        <label for="password" class="text-muted">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="text-muted d-block text-center mt-5">
                    Already registered ? 
                    <a href="/login" class="ty-main text-decoration-none">Login</a>
                </small>
                <small class="d-block text-center mt-1">
                    <a href="/" class="text-decoration-none text-secondary">cancel</a>
                </small>
                <small class="mt-2 mb-3 text-muted d-block text-center">zanzancode &copy; 2021</small>
            </main>
        </div>
    </div>
@endsection