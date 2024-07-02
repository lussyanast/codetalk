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

    .related-user-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%; /* Agar foto profil menjadi lingkaran */
    }

    .related-users-container {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        margin-bottom: 20px; /* Spasi bawah untuk kejelasan */
    }

    .related-user-card {
        width: 600px; /* Lebar foto profil */
        height: 600px; /* Tinggi foto profil */
        margin-right: 15px;
    }
</style>

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <!-- Profil Pengguna dan Statistik -->
                    <div class="d-flex mb-4">
                        <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4">
                            <img src="{{ $picture }}" alt="Photo Profile" class="avatar">
                        </div>
                        <div>
                            <div class="mb-4">
                                <div class="fs-2 fw-bold mb-1 lh-1 text-break">
                                    {{ $user->username }}
                                </div>
                                <div class="color-gray">
                                    Member since {{ $user->created_at->diffForHumans() }}
                                </div>
                                <div class="mt-2">
                                    <span class="fw-bold">{{ $followersCount }}</span> Followers
                                    <span class="ms-3 fw-bold">{{ $followingCount }}</span> Following
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" id="current-url" class="d-none" value="{{ request()->url() }}">
                    <a id="share-profile" class="btn btn-primary-green me-4" href="javascript:;">Share</a>
                    @auth
                        @if ($user->id === auth()->id())
                            <a href="{{ route('users.edit', $user->username) }}" class="btn btn-primary-white me-4">Edit Profile</a>
                        @else
                            @if (auth()->user()->isFollowing($user->id))
                                <form action="{{ route('users.unfollow', $user->username) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary-green">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('users.follow', $user->username) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary-white">Follow</button>
                                </form>
                            @endif
                        @endif
                    @endauth
                    <div class="card mt-4">
                        <h5>Activity Statistics</h5>
                        <ul>
                            <li>Total Discussions: {{ $totalDiscussions }}</li>
                            <li>Total Answers: {{ $totalAnswers }}</li>
                            <li>Total Likes: {{ $totalLikes }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <!-- Diskusi Pengguna -->
                    <div class="mb-5">
                        <h2 class="mb-3">My Discussions</h2>
                        <div>
                            @forelse ($discussions as $discussion)
                                <div class="card card-discussions mb-4 card-shadow">
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
                                <div class="card card-discussions">Currently no discussion yet.</div>
                            @endforelse

                            {{ $discussions->appends(['answers' => $answers->currentPage()])->links() }}
                        </div>
                    </div>
                    <!-- Jawaban Pengguna -->
                    <div>
                        <h2 class="mb-3">My Answers</h2>
                        <div>
                            @forelse ($answers as $answer)
                                <div class="card card-discussions card-shadow">
                                    <div class="row align-items-center">
                                        <div class="col-2 col-lg-1 text-center">
                                            {{ $answer->likeCount }}
                                        </div>
                                        <div class="col">
                                            <span>Replied to</span>
                                            <span class="fw-bold text-green">
                                                <a href="{{ route('discussions.show', $answer->discussion->slug) }}">
                                                    {{ $answer->discussion->title }}
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card card-discussions">Currently no answer yet.</div>
                            @endforelse

                            {{ $answers->appends(['discussions' => $discussions->currentPage()])->links() }}
                        </div>
                    </div>
                </div>
                <!-- Related Users -->
                <div class="col-12 mt-5">
                    <h3 class="mb-4">Related Users</h3>
                    <div class="related-users-container">
                        @forelse ($relatedUsers as $relatedUser)
                            <div class="card mb-3 related-user-card">
                                <div class="row g-0">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <img src="{{ filter_var($relatedUser->picture, FILTER_VALIDATE_URL)
                                            ? $relatedUser->picture : Storage::url($relatedUser->picture) }}"
                                            alt="{{ $relatedUser->username }}" class="avatar rounded-circle">
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('users.show', $relatedUser->username) }}">
                                                    {{ $relatedUser->username }}
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                {{ $relatedUser->discussions_count }} {{ Str::plural('discussion', $relatedUser->discussions_count) }}
                                            </p>
                                            <h6>Top Discussions:</h6>
                                            <ul class="">
                                                @forelse ($relatedUser->topDiscussions as $discussion)
                                                    <li>
                                                        <a href="{{ route('discussions.show', $discussion->slug) }}">
                                                            {{ $discussion->title }}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li>No top discussions found.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body">
                                    No related users found.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#share-profile').click(function() {
            var copyText = $('#current-url');

            copyText[0].select();
            copyText[0].setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.val());

            var alert = $('#alert');
            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');
            alertContainer.first().text('Link to this profile copied successfully');
        });
    });
</script>
@endsection
