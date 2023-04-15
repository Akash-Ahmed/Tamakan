<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('admin_template/assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin_template/assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin_template/assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('admin_template/assets/css/codebase.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>

<div id="page-container" class="main-content-boxed">

    @include('sweetalert::alert')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-dusk">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="#">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">Tamakan</span><span class="font-size-xl">Online</span>
                    </a>
                    <h1 class="h2 font-w700 mt-50 mb-10">Welcome to Tamakan Online Coding Test</h1>
                    <h2 class="h4 font-w400 text-muted mb-0">Please verify your account </h2>
                    <h2 class="h4 font-w400 text-muted mb-0">6 digit code send to your email</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-xl-4">
                        <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form method="post" action="{{ route('account.verification') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" id="verify_code" name="verify_code">
                                        <label for="login-username">Verification Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters-tiny">
                                <div class="col-12 mb-10">
                                    <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                        <i class="si si-login mr-10"></i> Submit
                                    </button>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="{{ url('/token_send') }}">
                                        <i class="fa fa-plus text-muted mr-5"></i> Resend
                                    </a>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
                <!-- END Sign In Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->


<script src="{{ asset('admin_template/assets/js/codebase.core.min.js')}}"></script>

<!--
    Codebase JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('admin_template/assets/js/codebase.app.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('admin_template/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('admin_template/assets/js/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>
