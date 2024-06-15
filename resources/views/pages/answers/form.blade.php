@extends('layouts.app')

@section('title', 'Answer a Question')

@section('body')
    <section class="bg-light pt-4 pb-5">
        <div class="container">
            <div class="mb-5 text-center">
                <h2 class="fw-bold">Answer a Question</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions p-4 shadow-sm">
                        <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" id="answer" rows="10" placeholder="Write your answer here...">
                                    {{ $answer->answer ?? old('answer') }}
                                </textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary me-3" type="submit">Submit</button>
                                <a href="{{ route('discussions.show', $answer->discussion->slug) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#answer').summernote({
                placeholder: 'Write your solution here...',
                tabSize: 2,
                height: 320,
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

            $('span.note-icon.caret').remove();
        });
    </script>
@endsection
