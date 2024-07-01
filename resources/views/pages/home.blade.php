@extends('layouts.app')

@section('body')
<section class="container hero bg-gradient-to-r from-green-400 to-blue-500 py-5 shadow" style="margin-top: 4rem;">
  <div class="row align-items-center h-100">
    <div class="col-12 col-lg-6 offset-lg-3 text-center">
      <img class="h-54px mb-4 logo-hover" src="{{ url('assets/images/logo-white.png') }}" alt="CodeTalk Logo">
      <p class="mb-4 animate__animated animate__fadeInUp">A supportive community where developers <b>can ask questions, 
        share insights, tackle coding challenges together, and create a dynamic space for learning and problem-solving.</b></p>
    </div>
  </div>
</section>

<section class="container py-5 min-h-372px d-flex justify-content-center align-items-center">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-4 text-center mb-4">
      <div class="py-4 px-3 m-4 card-shadow">
        <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png')}}" alt="Discussions">
        <h2>{{ Str::plural('Discussion', $discussionCount) }}</h2>
        <p class="fs-3 text-truncate" style="max-height: 100px; overflow-y: hidden;">{{ $discussionCount }}</p>
      </div>
    </div>
    <div class="col-12 col-lg-4 text-center mb-4">
      <div class="py-4 px-3 m-4 card-shadow">
        <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png')}}" alt="Answers">
        <h2>{{ Str::plural('Answer', $answerCount) }}</h2>
        <p class="fs-3 text-truncate" style="max-height: 100px; overflow-y: hidden;">{{ $answerCount }}</p>
      </div>
    </div>
    <div class="col-12 col-lg-4 text-center mb-4">
      <div class="py-4 px-3 m-4 card-shadow">
        <img class="promote-icon mb-2" src="{{ url('assets/images/users.png')}}" alt="Users">
        <h2>{{ Str::plural('User', $userCount) }}</h2>
        <p class="fs-3 text-truncate" style="max-height: 100px; overflow-y: hidden;">{{ $userCount }}</p>
      </div>
    </div>
  </div>
</section>

<section class="bg-gray">
  <div class="container py-80px">
    <h2 class="text-center mb-5">Help Others</h2>
    <div id="helpOthersCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach ($latestDiscussion->chunk(3) as $discussionChunk)
          <div class="carousel-item @if ($loop->first) active @endif">
            <div class="row">
              @foreach ($discussionChunk as $latestDiscussion)
              <div class="col-12 col-lg-4 mb-3">
                <div class="card shadow">
                  <a href="{{ route('discussions.show', $latestDiscussion->slug)}}">
                    <h3>{{ $latestDiscussion->title }}</h3>
                  </a>
                  <div>
                    <p class="mb-5">{{ $latestDiscussion->content_preview }}</p>
                    <div class="row">
                      <div class="col me-1 me-lg-2">
                        <a href="{{ route('discussions.categories.show', $latestDiscussion->category->slug) }}">
                          <span class="badge rounded-pill text-bg-light">{{ $latestDiscussion->category->name }}</span></a>
                      </div>
                      <div class="col-5 col-lg-7">
                        <div class="avatar-sm-wrapper d-inline-block">
                          <a href="{{ route('users.show', $latestDiscussion->user->username) }}" class="me-1">
                            <img src="{{ filter_var($latestDiscussion->user->picture, FILTER_VALIDATE_URL) ? $latestDiscussion->user->picture : Storage::url($latestDiscussion->user->picture) }}" class="avatar rounded-circle" alt="{{ $latestDiscussion->user->username }}">
                          </a>
                        </div>
                        <span class="fs-12px">
                          <a href="{{route('users.show', $latestDiscussion->user->username) }}" class="me-1 fw-bold">{{ strlen($latestDiscussion->user->username) >7 ? substr($latestDiscussion->user->username, 0,7) . '...' : $latestDiscussion->user->username }}</a>
                          <span class="color-gray">{{ $latestDiscussion->created_at->diffForHumans() }}</span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#helpOthersCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#helpOthersCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

<section class="container min-h-372px d-flex flex-column align-items-center justify-content-center">
  <h2>Ready to contribute?</h2>
  <p class="mb-4">Let's contribute to connect with each other </p>
  @auth
  <div class="text-center">
    <a href="{{ route('pages.home') }}" class="btn btn-primary-white me-2 mb-2 mb-lg-0">Sign Up</a>
    <a href="{{ route('discussions.index') }}" class="btn btn-primary-green mb-2 mb-lg-0">Join Discussions</a>
  </div>
  @endauth
  @guest
  <div class="text-center">
    <a href="{{ route('auth.sign-up.show') }}" class="btn btn-primary-white me-2 mb-2 mb-lg-0">Sign Up</a>
    <a href="{{ route('discussions.index') }}" class="btn btn-primary-green mb-2 mb-lg-0">Join Discussions</a>
  </div>
  @endguest
</section>
@endsection
