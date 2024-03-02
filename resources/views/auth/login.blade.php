<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{config('constants.software.name')}} - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

{{--<div class="home-btn d-none d-sm-block">--}}
    {{--<a href="index.html"><i class="fas fa-home h2 text-white"></i></a>--}}
{{--</div>--}}

<div class="account-pages w-100 mt-5 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center">
                            <a href="javascript:void(0)">
                                <span><img src="{{ asset("assets/images/logo.png") }}" style="width: 150px;"></span>
                            </a>
                        </div>

                        <form action="{{ route("login") }}" method="post" class="pt-2">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email"  value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>

                            {{--<div class="custom-control custom-checkbox mb-3">--}}
                                {{--<input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>--}}
                                {{--<label class="custom-control-label" for="checkbox-signin">Remember me</label>--}}
                            {{--</div>--}}

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" type="submit"> Log In </button>
                            </div>

                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted mb-0">&copy; {{ config('constants.development.session') }} Powered By <a href="{{ config('constants.developer.url') }}" target="_blank" class="text-dark ml-1"><b>{{ config('constants.developer.name') }}</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>

</html>