@extends('layouts.app')

<style>
    .pagination > li > a,
    .pagination > li > span {
        color: #00BD13; /* Warna teks link pagination */
    }

    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        background-color: #00BD13; /* Warna latar belakang saat di-hover */
        border-color: #00BD13; /* Warna border saat di-hover */
        color: white; /* Warna teks saat di-hover */
    }

    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        background-color: #00BD13; /* Warna latar belakang untuk halaman aktif */
        border-color: #00BD13; /* Warna border untuk halaman aktif */
        color: white; /* Warna teks untuk halaman aktif */
    }
</style>

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-4">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h2 class="me-4 mb-0">
                        @if (isset($search)) {{ "Search results for \"$search\"" }} @else {{ 'All Discussions' }} @endif
                        <span>{{ isset($withCategory) ? ' About ' . $withCategory->name : '' }}</span>
                    </h2>
                    <div>
                        {{ $discussions->total() . ' '
                            . Str::plural('Discussion', $discussions->total()) }}
                    </div>
                </div>
                @auth
                    <a href="{{ route('discussions.create') }}" class="btn btn-primary-white">Create Discussion</a>
                @endauth
                @guest
                    <a href="{{ route('auth.login.show') }}" class="btn btn-primary-green">Log In to Create Discussion</a>
                @endguest
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    @forelse ($discussions as $discussion)
                    <div class="card card-discussions mb-4">
                        <div class="row p-3">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div class="text-nowrap me-2 me-lg-0">
                                    {{ $discussion->likeCount . ' ' . Str::plural('like', $discussion->likeCount) }}
                                </div>
                                <div class="text-nowrap color-gray">
                                    {{ $discussion->answers->count() . ' '
                                        . Str::plural('answer', $discussion->answers->count()) }}
                                </div>
                            </div>
                            <div class="col-12 col-lg-10">
                                <a href="{{ route('discussions.show', $discussion->slug) }}">
                                    <h3>{{ $discussion->title }}</h3>
                                </a>
                                <p>{!! $discussion->content_preview !!}</p>
                                <div class="row">
                                    <div class="col me-1 me-lg-2">
                                        <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                            <span class="badge rounded-pill text-bg-light">{{ $discussion->category->name }}</span>
                                        </a>
                                    </div>
                                    <div class="col-5 col-lg-4">
                                        <div class="avatar-sm-wrapper d-inline-block">
                                            <a href="{{ route('users.show', $discussion->user->username) }}" class="me-1">
                                                <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL)
                                                    ? $discussion->user->picture : Storage::url($discussion->user->picture) }}"
                                                    alt="{{ $discussion->user->username }}"
                                                    class="avatar rounded-circle">
                                            </a>
                                        </div>
                                        <span class="fs-12px">
                                            <a href="{{ route('users.show', $discussion->user->username) }}" class="me-1 fw-bold">
                                                {{ $discussion->user->username }}
                                            </a>
                                            <span class="color-gray">{{ $discussion->created_at->diffForHumans() }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="card card-discussions">Currently no discussion yet</div>
                    @endforelse

                    {{ $discussions->links() }}
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card p-3">
                        <h3>All Categories</h3>
                        <div>
                            @foreach ($categories as $category)
                            <a href="{{ route('discussions.categories.show', $category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
