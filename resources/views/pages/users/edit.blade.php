@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container my-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5 mb-4 text-center">
                    <form action="{{ route('users.update', $user->username) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="edit-avatar-wrapper mb-3">
                            <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink">
                                <img id="avatar" src="{{ asset('storage/' . $user->picture) }}" alt="Photo Profile" class="avatar">
                            </div>
                            <label for="picture" class="btn p-0 edit-avatar-show">
                                <img src="{{ url('assets/images/edit-circle.png') }}" alt="Edit circle">
                            </label>
                            <input type="file" class="d-none" id="picture" name="picture" accept="image/*">
                        </div>
                </div>
                <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username"
                                name="username" 
                                value="{{ old('username', $user->username)}}" autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="fs-12px text-muted">
                                Leave this empty if you don't want to change your password.
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            <div class="fs-12px text-muted">
                                Leave this empty if you don't want to change your password.
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary-white me-4" type="submit">Save</button>
                            <a href="{{ route('users.show', $user->username) }}">Cancel</a>
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
