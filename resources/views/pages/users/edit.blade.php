@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container my-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5 mb-4 text-center">
                    <form action="">
                        <div class="edit-avatar-wrapper mb-3">
                            <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink">
                                <img id="avatar" src="{{ url('assets/images/avatar.png') }}" alt="Photo Profile" class="avatar">
                            </div>
                            <label for="picture" class="btn p-0 edit-avatar-show">
                                <img src="{{ url('assets/images/edit-circle.png') }}" alt="Edit circle">
                            </label>
                            <input type="file" class="d-none" id="picture" name="picture" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-7">
                    <form action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="fs-12px text-muted">
                                Leave this empty if you don't want to change your password.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                            <div class="fs-12px text-muted">
                                Leave this empty if you don't want to change your password.
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary-white me-4" type="submit">Save</button>
                            <a href="#">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $('#picture').on('change', function(event) {
            var output = $('#avatar');
            output.attr('src', URL.createObjectURL(event.target.files[0]));
            output.on('load', function() {
                URL.revokeObjectURL(output.attr('src'));
            });
        });
    </script>
@endsection
