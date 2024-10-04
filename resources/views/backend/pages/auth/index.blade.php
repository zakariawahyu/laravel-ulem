<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Login</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('assets/backend/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/backend/css/rtl/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('assets/backend/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('assets/backend/css/demo.css') }}" />

        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/page-auth.css') }}" />
    </head>

    <body>
        <!-- Content -->
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Login -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2">Welcome to Wedding Configuration! 👋</h4>
                            <p class="mb-4">Please sign-in to your account and start the adventure</p>
                            <form class="mb-3" action="{{ route('do-login') }}" method="POST" id="formAuthentication">
                                @csrf
                                @if (session('error-login'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error</h6>
                                        <p class="mb-0">{{ session('error-login') }}</p>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control {{ ($errors->any() && $errors->has('username')) ? 'is-invalid' : '' }}" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" />
                                    @if ($errors->any() && $errors->has('username'))
                                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control {{ ($errors->any() && $errors->has('password')) ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        @if ($errors->any() && $errors->has('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login -->
                </div>
            </div>
        </div>
        <!-- / Content -->
    </body>
</html>
