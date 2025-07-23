<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
</head>
<body>
    @php
        $hideNav = in_array(Route::currentRouteName(), ['login', 'register']);
    @endphp
    @unless($hideNav)
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
        <div class="container-fluid">
            <!-- {{-- <a class="navbar-brand" href="{{ url('/dashboard') }}">Dashboard</a> --}} -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('categories*') ? ' active' : '' }}" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('subcategories*') ? ' active' : '' }}" href="{{ route('subcategories.index') }}">Subcategories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('books*') ? ' active' : '' }}" href="{{ route('books.index') }}">Books</a>
                    </li>
                    {{-- Remove or comment out this block --}}
                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('images*') ? ' active' : '' }}" href="{{ route('images.index') }}">Images</a>
                    </li>
                    --}}
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer;">Logout</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @endunless
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
