<nav class="navbar navbar-expand-lg navbar-dark {{ Request::is('/') ? 'home' : 'bg-dark shadow' }}">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ url('/img/logo.svg') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      {{-- <span class="navbar-toggler-icon"></span> --}}
      <div class="navbar-toggler-animation"></div>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'home')? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'about')? 'active' : '' }}" href="{{ url('/about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'post')? 'active' : '' }}" href="{{ url('/blog/posts') }}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === 'categories')? 'active' : '' }}" href="{{ url('/blog/categories') }}">Categories</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{  auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-style" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'login')? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>