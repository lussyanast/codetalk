@extends('layouts.auth')

@section('body')
<section class="bg-gray vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <a href="" class="nav-link mb-5 text-center">
                    <img class="h-32px" src="{{ url('assets/images/logo-green.png') }}" alt="CodeTalk Logo">
                </a>
                <div class="card p-4 shadow">
                    <form action="{{ route('auth.login.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror @error('credentials') is-invalid @enderror" 
                            id="email" name="email" placeholder="name@example.com" autocomplete="off" autofocus
                            value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('credentials')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                <button class="btn btn-outline-secondary" type="button" id="password-toggle">
                                    <img src="{{ url('assets/images/eye-slash.png') }}" alt="Password toggle" id="password-toggle-img">
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary-white rounded-2">Log in</button>
                        </div>
                    </form>
                    
                </div>
                <div class="text-center mt-3">
                    Don't have an account? <a href="{{ route('auth.sign-up.show') }}" class="text-underline color-primary"><u>Sign Up</u></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('after-script')
<script>
    var isPasswordRevealed = false;

    document.getElementById('password-toggle').addEventListener('click', function() {
        isPasswordRevealed = !isPasswordRevealed;

        if (isPasswordRevealed) {
            document.getElementById('password-toggle-img').setAttribute('src', "{{ url('assets/images/eye.png') }}");
            document.getElementById('password').setAttribute('type', 'text');
        } else {
            document.getElementById('password-toggle-img').setAttribute('src', "{{ url('assets/images/eye-slash.png') }}");
            document.getElementById('password').setAttribute('type', 'password');
        }
    });
</script>
@endsection
