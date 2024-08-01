@extends('layouts.default', [
    'paceTop' => true,
    'appSidebarHide' => true,
    'appHeaderHide' => true,
    'appContentClass' => 'p-0',
])

@section('title', 'Login Page')

@section('content')
    <!-- BEGIN login -->
    <div class="login login-with-news-feed">
        <!-- BEGIN news-feed -->
        <div class="news-feed">
            {{-- <div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-11.jpg)"></div> --}}
            <div class="news-image"
                style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; background-image: url('/assets/img/login-bg/login-bg-11.jpg'); background-size: cover; background-position: center;">
                <video src="{{ asset('assets/video/bg_login.mp4') }}"
                    style="position: absolute; top: 0; left: 0; width: 150%; height: 150%; border: 0;" autoplay loop
                    muted></video>
            </div>
            <div class="news-caption">
                <h4 class="caption-title"><b>Rifqi</b> Munawar App</h4>
                <p>
                    Download the this app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.
                </p>
            </div>
        </div>
        <!-- END news-feed -->

        <!-- BEGIN login-container -->
        <div class="login-container">
            <div class="login-header mb-30px">
                <div class="brand">
                    <div class="d-flex align-items-center">
                        <span class="logo"></span>


                        <b>Rifqi</b> Munawar
                    </div>
                    <small>Bootstrap 5 Responsive 2024</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in-alt"></i>
                </div>
            </div>
            <div class="login-content">
                <form action="{{ route('authenticate') }}" method="POST" class="fs-13px"enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <div class="form-floating mb-15px">
                        <input type="text" name="email" class="form-control h-45px fs-13px" placeholder="Email Address"
                            id="emailAddress" />
                        <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Email
                            Address</label>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="password" class="form-control h-45px fs-13px" placeholder="Password"
                            id="password" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mb-30px">
                        <input class="form-check-input" type="checkbox" value="1" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">
                            Remember Me
                        </label>
                    </div>
                    <div class="mb-15px">
                        <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
                    </div>
                    <div class="mb-40px pb-40px text-dark">
                        Not a member yet? Click <a href="{{ route('register') }}" class="text-primary">here</a> to register.
                    </div>
                    <hr class="bg-gray-600 opacity-2" />
                    <div class="text-gray-600 text-center text-gray-500-darker mb-0">
                        &copy; Color Admin All Right Reserved 2024
                    </div>
                </form>
            </div>
        </div>
        <!-- END login-container -->
    </div>
    <!-- END login -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('background-video');
            video.play().catch(function(error) {
                console.log('Autoplay was prevented:', error);
                // Optional: Add a button to allow the user to start playback manually
                var button = document.createElement('button');
                button.textContent = 'Play Video';
                button.onclick = function() {
                    video.play();
                    button.remove();
                };
                document.body.appendChild(button);
            });
        });
    </script>
@endsection
