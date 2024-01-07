<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Login</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('Backend/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('uploads/favicon.png') }}" sizes="32x32">
</head>

<body class="bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-8">
                <div class="card-login card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form method="POST" action="{{ route('otp_post') }}">
                                        @csrf

                                        <p class="text-center">OTP code sent to your phone : ******{{substr(auth()->user()->phone, -2) }}</p>

                                        @if ($message = Session::get('success'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($message = Session::get('error'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group row">
                                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                                            <div class="col-md-6">
                                                <input id="code" type="text"
                                                    class="form-control @error('code') is-invalid @enderror" name="code"
                                                    value="{{ old('code') }}" required autocomplete="code" autofocus>

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <a class="btn btn-link" href="{{ route('otp_resend') }}">Resend Code?</a>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Backend/js/app.js') }}" defer></script>
    <script src="{{ asset('Backend/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
