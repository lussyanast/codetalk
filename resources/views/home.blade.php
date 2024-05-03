<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeTalk</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>

    <header>
      <nav class="navbar navbar-light navbar-expand-lg bg-light">
        <div class="container flex justify-content-between">
          <a class="navbar-link" href="{{ route('home')}}">
            <img class="h-32px" src="{{ url('assets/images/logo-green.png') }}" alt="CodeTalk Logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-0 mx-lg-3">
              <li class="nav-item d-block d-lg-none d-xl-block">
                <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Discussions</a>
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
              <li class="nav-item my-auto">
                <a class="btn btn-primary-green" href="#">Log In</a>
              </li>
              <li class="nav-item ps-1 pe-0">
                <a class="btn btn-primary-white" href="#">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <body>
          <section class="container hero bg-green margin-hero py-5">
            <div class="row align-items-center h-100">
              <div class="col-12 col-lg-6 center-text">
                <h1>CodeTalk<br/></h1>
                <h2>Community Forum</h2>
                <p class="mb-4">Empowering the students to connect and learn</p>
                <a href="#" class="btn btn-primary-white me-2 mb-2 mb-lg-0">Sign Up</a>
                <a href="#" class="btn btn-primary-green mb-2 mb-lg-0">Join Discussions</a>
              </div>
            </div>
          </section>

          <section class="container min-h-372px">
            <div class="row">
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png')}}" alt="Discussions">
                <h2>Discussions</h2>
                <p class="fs-3">34834</p>
              </div>
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png')}}" alt="Answers">
                <h2>Answers</h2>
                <p class="fs-3">98666</p>
              </div>
              <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/users.png')}}" alt="Users">
                <h2>Users</h2>
                <p class="fs-3">122</p>
              </div>
            </div>
          </section>

          <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>
