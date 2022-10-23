<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Virtual Online Academy - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    {{--<form role="form">--}}
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                                </div>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">
                                Login
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('assets/vendor/metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
