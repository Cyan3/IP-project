<!doctype html>
<html language="en">
<head>
    <meta charset="UTF-8">
    <title>MODULES</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->


    {{--<link rel="stylesheet" href="css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" href="css/simple-line-icons.css">--}}
    {{--<link rel="stylesheet" href="css/app.css" type="text/css">--}}
    {{--<link rel="stylesheet" href="css/style.css" type="text/css"/>--}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>

<div id="page" class="container">
    <div id="header" class="container">
        <div class="row">
            <div id="menu" class="col-md-12">
                <div class="nav col-md-6">
                    @yield('header')

                </div>
                <div id="user-menu" class="col-md-6">


                    <div class="dropdown user-menu">
                        <div class="user-name">{{Auth::user()->fname}} {{Auth::user()->lname}}</div>
                        <button class="user-img dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-expanded="true">

                            <img src="img/avatar.jpg">
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="editare">Editare
                                    profil</a></li>
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="auth/logout">Iesire</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('contenter')
</div>
<div id="footer" class="container">
    @yield('Yfooter')
</div>

{{--<link href="{{ asset('/css/style.css') }}" rel="stylesheet">--}}
<script src={{ asset('js/jquery-1.11.2.min.js') }} type="text/javascript"></script>
<script src={{ asset('js/bootstrap.min.js') }} type="text/javascript"></script>
<script src={{ asset('js/main.js') }} type="text/javascript"></script>
<script src={{ asset('js/myFile.js') }} type="text/javascript"></script>
</body>
</html>