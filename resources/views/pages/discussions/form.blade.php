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
                                    <option value="">Select Category</option>
                                    <option value="html">HTML</option>
                                    <option value="php">PHP</option>
                                    <option value="css">CSS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Question</label>
                                <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary me-3" type="submit">Publish</button>
                                <a href="#" class="btn btn-secondary">Cancel</a>
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
            $('#content').summernote({
                placeholder: 'The details of your problem | What did you try | What you were expecting',
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
