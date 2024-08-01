@extends('layouts.default', [
    'paceTop' => true,
    'appSidebarHide' => true,
    'appHeaderHide' => true,
    'appContentClass' => 'p-0',
])

@section('title', 'Register Page')

@section('content')
    <!-- BEGIN register -->
    <div class="register register-with-news-feed">
        <!-- BEGIN news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b>Color</b> Admin App</h4>
                <p>
                    As a Color Admin app administrator, you use the Color Admin console to manage your organization’s
                    account, such as add new users, manage security settings, and turn on the services you want your team to
                    access.
                </p>
            </div>
        </div>
        <!-- END news-feed -->

        <!-- BEGIN register-container -->
        <div class="register-container">
            <!-- BEGIN register-header -->
            <div class="register-header mb-25px h1">
                <div class="mb-1">Sign Up</div>
                <small class="d-block fs-15px lh-16">Create your Color Admin Account. It’s free and always will be.</small>
            </div>
            <!-- END register-header -->

            <!-- BEGIN register-content -->
            <div class="register-content">
                <form action="{{ route('register.store') }}" class="fs-13px"method="post" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label class="mb-2">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="row gx-3">
                            <div class="col-md-12 mb-2 mb-md-0">
                                <input type="text" class="form-control fs-13px" name="name"
                                    placeholder="Nama Lengkap" />
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control fs-13px" name="email" placeholder="Email address" />
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control fs-13px" name="password" placeholder="Password" />
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" />
                        <label class="form-check-label" for="agreementCheckbox">
                            By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read
                            our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
                        </label>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-theme d-block w-100 btn-lg h-45px fs-13px">Sign Up</button>
                    </div>
                    <div class="mb-4 pb-5">
                        Already a member? Click <a href="{{ route('login') }}">here</a> to login.
                    </div>
                    <hr class="bg-gray-600 opacity-2" />
                    <p class="text-center text-gray-600">
                        &copy; Color Admin All Right Reserved 2023
                    </p>
                </form>
            </div>
            <!-- END register-content -->
        </div>
        <!-- END register-container -->
    </div>
    <!-- END register -->
@endsection
