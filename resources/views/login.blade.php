@extends('layout.auth')
@section('acc')
<div class="wrapper">
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-7 align-self-center">
                                    <div class="p-3">
                                        <h2 class="mb-2">Sign In</h2>
                                        <p>Login to stay connected.</p>
                                        <form method="POST" action="{{ route('postlogin') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" type="email" name="email" placeholder=" " required>
                                                        <label>Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" type="password" name="password" placeholder=" " required>
                                                        <label>Password</label>
                                                    </div>
                                                    @if(session('error'))
                                                        <span class="text-danger">{{ session('error') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                            <p class="mt-3">
                                                Create an Account <a href="{{ route('register-user') }}" class="text-primary">Sign Up</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 content-right">
                                    <video src="../assets/images/login/patlima.mp4" class="img-fluid image-right" autoplay loop muted></video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
