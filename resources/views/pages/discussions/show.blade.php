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
        <div class="mb-5">
            <div class="d-flex align-items-center">
                <div class="d-flex">
                    <div class="fs-2 fw-bold color-gray me-2 mb-0">Discussions</div>
                    <div class="fs-2 fw-bold color-gray me-2 mb-0">></div>
                </div>
                <h2 class="mb-0">{{ $discussion->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                <div class="card card-discussions mb-4 p-3">
                    <div class="row">
                        <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                            <a id="discussion-like" href="javascript:;" data-liked="{{ $discussion->liked() }}">
                                <img src="{{ $discussion->liked() ? $likedImage : $notLikedImage }}" alt="Like" id="discussion-like-icon" class="like-icon answer-like-icon mb-1">
                            </a>
                            <span id="discussion-like-count" class="fs-4 color-gray mb-1">{{ $discussion->likeCount }}</span>
                        </div>
                        <div class="col-11">
                            <p>{!! $discussion->content !!}</p>
                            <div class="mb-3">
                                <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $discussion->category->slug }}</span>
                                </a>
                            </div>
                            <div class="row align-items-start justify-content-between">
                                <div class="col">
                                    <span class="color-gray me-2">
                                        <a href="javascript:;" id="share-discussion"><small>Share</small></a>
                                        <input type="text" value="{{ route('discussions.show', $discussion->slug) }}" id="current-url" class="d-none">
                                    </span>
                                    @if ($discussion->user_id === auth()->id())
                                    <span class="color-gray me-2">
                                        <a href="{{ route('discussions.edit', $discussion->slug) }}">
                                            <small class="card-discussion-delete-btn">Edit</small>
                                        </a>
                                    </span>
                                    <form action="{{ route('discussions.destroy', $discussion->slug) }}" class="d-inline-block 1h-1" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="color-gray btn p-0 1h-1" id="delete-discussion">
                                            <small>Delete</small>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <div class="col-5 col-lg-3 d-flex">
                                    <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                        <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) ? $discussion->user->picture : Storage::url($discussion->user->picture) }}" alt="Profile" class="avatar">
                                    </a>
                                    <div class="fs-12px lh-1">
                                        <span>
                                            <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">{{ $discussion->user->username }}</a>
                                        </span>
                                        <span class="color-gray">{{ $discussion->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $answerCount = $discussion->answers->count();
                @endphp
                <h3 class="mb-4">{{ $answerCount . ' ' . Str::plural('Answer', $answerCount) }}</h3>
                <div class="mb-5">
                    @forelse ($discussionAnswers as $answer)
                        <div class="card card-discussions mb-4 p-3">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="javascript:;" data-id="{{ $answer->id }}" data-liked="{{ $answer->liked() }}" class="answer-like">
                                        <img src="{{ $answer->liked() ? $likedImage : $notLikedImage }}" alt="Like" class="like-icon answer-like-icon mb-1">
                                    </a>
                                    <span class="answer-like-count fs-4 color-gray mb-1">{{ $answer->likeCount }}</span>
                                </div>
                                <div class="col-11">
                                    <p>{!! $answer->answer !!}</p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col">
                                            @if ($answer->user_id === auth()->id())
                                                <span class="color-gray me-2">
                                                    <a href="{{ route('answers.edit', $answer->id) }}">
                                                        <small>Edit</small>
                                                    </a>
                                                </span>
                                                <form action="{{ route('answers.destroy', $answer->id) }}"
                                                    class="d-inline-block 1h-1" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-answer color-gray
                                                        btn btn-link text-decoration-none p-0 1h-1">
                                                        <small>Delete</small>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ filter_var($answer->user->picture, FILTER_VALIDATE_URL) ? $answer->user->picture : Storage::url($answer->user->picture) }}" alt="{{ $answer->user->username }}" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="{{ $answer->user->username === $discussion->user->username ? 'text-primary' : '' }}">
                                                    <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">{{ $answer->user->username }}</a>
                                                </span>
                                                <span class="color-gray">5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card card-discussions">
                            Currently no answer yet.
                        </div>
                    @endforelse
                    {{ $discussionAnswers->links() }}
                </div>
                @auth
                @endauth
                <h3 class="mb-5">Your Answer</h3>
                <div class="card card-discussions">
                    <form action="{{ route('discussions.answer.store', $discussion->slug) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="answer" id="answer">{{ old('answer') }}</textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary-white me-4">Submit</button>
                        </div>
                    </form>
                </div>
                @guest
                <div class="fw-bold text-center">
                    Please <a href="{{ route('auth.login.show') }}" class="text-underline color-primary">sign in</a> or <a href="{{ route('auth.sign-up.show') }}" class="text-underline color-primary">create an account</a> to participate in this discussion.
                </div>
                @endguest
            </div>
            <div class="col-12 col-lg-4">
                <div class="card p-3 mb-4">
                    <h3>All Categories</h3>
                    <div>
                        @foreach ($categories as $category)
                        <a href="{{ route('discussions.categories.show', $category->slug) }}">
                                <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="card p-3 mb-4">
                    <h3>Top Pick Categories</h3>
                    <div>
                        @isset($topCategories)
                            @foreach ($topCategories as $category)
                                <a href="{{ route('discussions.categories.show', $category->slug) }}?search={{ $search ?? '' }}&sort={{ $sort ?? 'latest' }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#share-discussion').click(function() {
            var copyText = $('#current-url');

            copyText[0].select();
            copyText[0].setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.val());

            var alert = $('#alert');
            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');
            alertContainer.first().text('Link to this discussion copied successfully');
        });

        $('#answer').summernote({
            placehorder: 'Write your solution here',
            tabSize: 2,
            height: 220,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview', 'help']],
            ]
        });

        $('span.note-icon-caret').remove();

        $('#discussion-like').click(function() {
            var isLiked = $(this).data('liked');
            var likeRoute = isLiked ? '{{ route("discussions.like.unlike", $discussion->slug) }}' : '{{ route("discussions.like.like", $discussion->slug) }}';

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            })
            .done(function(res) {
                if (res.status === 'success') {
                    $('#discussion-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                    } else {
                        $('#discussion-like-icon').attr('src', '{{ $likedImage }}');
                    }

                    $('#discussion-like').data('liked', !isLiked);
                }
            });
        });

        $('#delete-discussion').click(function(event) {
            if (!confirm('Delete this discussion?')) {
                event.preventDefault();
            }
        });

        $('.answer-like').click(function() {
            var $this = $(this);
            var id = $this.data('id');
            var isLiked = $this.data('liked');
            var likeRoute = isLiked ? '{{ url('') }}/answers/' + id + '/unlike' : '{{ url('') }}/answers/' + id + '/like';

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            })
            .done(function(res) {
                if (res.status === 'success') {
                    $this.siblings('.answer-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $this.find('.answer-like-icon').attr('src', '{{ $notLikedImage }}');
                    } else {
                        $this.find('.answer-like-icon').attr('src', '{{ $likedImage }}');
                    }

                    $this.data('liked', !isLiked);
                } else {
                    alert(res.message);
                }
            })
            .fail(function() {
                alert('Error liking the answer');
            });
        });

        $('.delete-answer').click(function(event) {
            if (!confirm('Delete this answer?')) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection
