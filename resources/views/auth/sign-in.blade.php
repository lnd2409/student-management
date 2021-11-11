<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Nexa :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('template/admin') }}/favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('template/admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template/admin') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('template/admin') }}/assets/css/authentication.css">
    <link rel="stylesheet" href="{{ asset('template/admin') }}/assets/css/color_skins.css">
    @toastr_css
</head>

<body class="theme-orange">
    <div class="authentication">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header slideDown">
                            <div class="logo"><img src="{{ asset('template/admin') }}/assets/images/logo.png"
                                    alt="Nexa"></div>
                            <h1>Nexa Admin</h1>
                            <ul class="list-unstyled l-social">
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook-box"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <form class="col-lg-12" id="sign_in" method="POST" action="{{route('handleLogin')}}"
                        autocomplete="off">
                        @csrf
                        <h5 class="title">Sign in to your Account</h5>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" value="SV003">
                                <label class="form-label">Username</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="SV003">
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">SIGN
                                IN</button>
                        </div>
                        <div class="col-lg-12 m-t-20">
                            <a class="" href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('template/admin') }}/assets/bundles/libscripts.bundle.js"></script>
    <script src="{{ asset('template/admin') }}/assets/bundles/vendorscripts.bundle.js"></script>
    <script src="{{ asset('template/admin') }}/assets/bundles/mainscripts.bundle.js"></script>

    @toastr_js
    @toastr_render
</body>

</html>
