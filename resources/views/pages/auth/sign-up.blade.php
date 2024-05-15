@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-6 text-lg-start text-center mb-5 mb-lg-0">
                    <div class="d-none d-lg-block">
                        <h1>Join CodeTalk</h1>
                        <p>
                            Find the answer to your question
                            and help others answer theirs.
                        </p>
                    </div>
                    <div class="d-block d-lg-none fs-4">
                        Create your account in a minute.
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="text-center mb-5">
                        <a href="#" class="nav-link">
                            <img src="{{ url('assets/images/logo-green.png') }}" alt="CodeTalk Logo" class="img-fluid" style="max-width: 300px;">
                        </a>
                    </div>
                    <div class="card p-4 shadow">
                        <form action="#">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" autocomplete="off" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username *</label>
                                <input type="text" class="form-control" id="username" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-end-0 pe-0" id="password" name="password">
                                    <span class="input-group-text bg-white border-start-0 pe-auto">
                                        <a href="javascript:;" id="password-toggle">
                                            <img src="{{ url('assets/images/eye-slash.png') }}" alt="Password toggle" id="password-toggle-img">
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary-white rounded-2">Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center mt-3">
                        Already have an account? <a href="login" class="text-underline color-primary"><u>Log In</u></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
<script>
    var isPasswordRevealed = false;

    $('#password-toggle').on('click', function() {
        isPasswordRevealed = !isPasswordRevealed;

        if (isPasswordRevealed) {
            $('#password-toggle-img').attr('src', "{{ url('assets/images/eye.png') }}");
            $('#password').attr('type', 'text');
        } else {
            $('#password-toggle-img').attr('src', "{{ url('assets/images/eye-slash.png') }}");
            $('#password').attr('type', 'password');
        }
    });
</script>
@endsection
