@extends('layouts.app')

@section('body')
    <section class="bg-light pt-4 pb-5">
        <div class="container">
            <div class="mb-5 text-center">
                <h2 class="fw-bold">
                    Ask a Question
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions p-4">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="category_slug" class="form-label">Category</label>
                                <select class="form-select" name="category_slug" id="category_slug">
                                    <option value="">-- Choose One --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Question</label>
                                <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary me-3" type="submit">Publish</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
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
            // Initialize Summernote
            $('#content').summernote({
                placeholder: 'Write your problems here...',
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

            // Initialize Select2
            $('#category_slug').select2({
                placeholder: "-- Choose One --",
                allowClear: true
            });

            // Get and sort options
            let options = $('#category_slug option').toArray().sort((a, b) => {
                if (a.text.toLowerCase() < b.text.toLowerCase()) return -1;
                if (a.text.toLowerCase() > b.text.toLowerCase()) return 1;
                return 0;
            });

            // Append sorted options back
            $('#category_slug').empty().append(options);
            $('#category_slug').trigger('change'); // Update Select2
        });
    </script>
@endsection
