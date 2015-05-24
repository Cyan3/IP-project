
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Pasul 4</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->

    <link href="{{ asset('/css/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="page" class="container">
    <div id="header" class="container">
        <div class="row">
            <div id="menu" class="col-md-12">
                <div class="nav col-md-6">
                    <ul class="list-inline">
                        <li><a href="#">Punctaje</a>
                        <li><a href="#">Modul 1</a></li>
                        <li><a href="#">Modul 2</a></li>
                        <li><a href="#">Modul 3</a></li>
                    </ul>
                </div>
                <div id="user-menu" class="col-md-6">


                    <div class="dropdown user-menu">
                        <div class="user-name">John Doe</div>
                        <button class="user-img dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-expanded="true">

                            <img src="img/avatar.png">
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="#">Setari
                                    profil</a></li>
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="#">Editare
                                    profil</a></li>
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="#">Iesire</a>
                            </li>
                        </ul>
                    </div>


                </div>

            </div>
        </div>
    </div>
 </div>
<div id="content">
    <div class="row">
        <div id="steps" class="col-md-12">
            <div class="step col-md-3">
                <div class="number">1</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">2</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">3</div>
                <div class="line"></div>
            </div>
            <div class="step active col-md-3">
                <div class="number">4</div>
                <div class="line"></div>
            </div>
        </div>
    </div>

    <div class="CSSTableGenerator" >
        <table >
            <tr>
                <td>
                    {{$first}}
                </td>
                <td>
                    {{$first}}
                </td>
            </tr>
            <tr>
                <td>
                    {{$second}}
                </td>
                <td>
                    {{$second}}
                </td>
            </tr>
            <tr>
                <td>
                    {{$third}}
                </td>
                <td>
                    {{$third}}
                </td>
               <tr>
                <td>
                    {{$fourth}}
                </td>
                <td>
                    {{$fourth}}
                </td>
            </tr>
        </table>
     </div>

</div>
<div id="footer" class="container">
    <div class="row">
        <ul class="list-inline col-md-7">
            <li><a href="#">Despre Proiect</a>
            <li><a href="#">Creatori</a></li>
            <li><a href="#">Punctaje</a></li>
        </ul>
        <div class="rights">© 2015 – Toate drepturile sunt rezervate.</div>
    </div>
</div>


<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>