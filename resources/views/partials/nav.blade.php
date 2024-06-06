<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeTalk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-light border shadow">
        <div class="container flex justify-content-between">
            <a class="navbar-link" href="{{ route('home') }}">
                <img class="h-32px" src="{{ url('assets/images/logo-green.png') }}" alt="CodeTalk Logo">
            </a>
            <button class="navbar-toggler custom-toggler collapsed" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-0 mx-lg-3">
                    <li class="nav-item d-block d-lg-none d-xl-block">
                        <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'discussions.index' ? 'active' : '' }}" href="{{ route('discussions.index') }}">Discussions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" href="#">About Us</a>
                    </li>
                </ul>
                <form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="#" method="GET">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <img class="h-32px" src="{{ url('assets/images/magnifier.png') }}" alt="Search">
                        </span>
                        <input class="form-control border-start-0 ps-0" type="search" 
                            placeholder="Search" aria-label="Search" name="" value="">
                    </div>
                </form>

                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @auth
                    <li class="nav-item my-auto dropdown">
                        <a class="nav-link p-0 d-flex align-items-center" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="avatar-nav-wrapper me-2">
                                <img src="{{ filter_var(auth()->user()->picture, FILTER_VALIDATE_URL) 
                                    ? auth()->user()->picture : Storage::url(auth()->user()->picture) }}" 
                                    alt="{{ auth()->user()->username }}" class="avatar rounded-circle">
                            </div>
                            <span class="fw-bold">{{ auth()->user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu mt-2">
                            <li>
                                <a class="dropdown-item" href="#">My Profile</a>
                            </li>
                            <li>
                                <form action="{{ route('auth.login.logout')}}" method="POST">
                                  @csrf
                                    <button type="submit" class="dropdown-item">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item my-auto">
                        <a class="btn btn-primary-green {{ Route::currentRouteName() === 'auth.login.show' ? 'active' : '' }}" 
                        href="{{ route('auth.login.show') }}">Log In</a>
                    </li>
                    <li class="nav-item ps-1 pe-0">
                        <a class="btn btn-primary-white" href="{{ route('auth.sign-up.show') }}">Sign Up</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
