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
                        @error('picture')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
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
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
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
                            <a href="{{ route('users.show', $user->username) }}" class="btn btn-primary-green">Cancel</a>
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
            var file = event.target.files[0];
            var output = $('#avatar');
            var maxSize = 1024 * 1024; 
            var reader = new FileReader();

            if (file.type.match('image.*') && file.size <= maxSize) {
                reader.onload = function(e) {
                    output.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file (max 1MB)!');
                $('#picture').val(''); 
                output.attr('src', '{{ asset('storage/' . $user->picture) }}'); 
            }
        });
    </script>
@endsection
