<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Account Balance</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="d-flex text-center flex-wrap justify-content-center vertical-content-center">
            <div class="text-acc mb-3">Account Balance</div>
            <div class="links">
                <a href="#" style="text-decoration: none;">Services</a>
                <a href="#" style="text-decoration: none;">Members</a>
                <a href="#" style="text-decoration: none;">About Us</a>
                <a href="#" style="text-decoration: none;">Security</a>
            </div>
        </div>
        <div class="area"></div><nav class="main-menu">
            <ul>
                @if (Route::has('login'))
                @auth
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="{{ route('profile') }}">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            My Profile
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                @else
                <li class="has-subnav">
                    <a href="{{ route('login') }}">
                       <i class="fa fa-sign-in fa-2x"></i>
                        <span class="nav-text">
                            Login
                        </span>
                    </a>
                    @if (Route::has('register'))
                        <li class="has-subnav">
                            <a href="{{ route('register') }}">
                               <i class="fa fa-user fa-2x"></i>
                                <span class="nav-text">
                                    Register
                                </span>
                            </a>
                         </li>
                    @endif
                @endauth
                </li>
                @endif
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                           Quotes
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                   <a href="https://github.com/imsouza/account-balance">
                        <i class="fa fa-github-alt fa-2x"></i>
                        <span class="nav-text">
                            Github
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="logout">
                       <i class="fa fa-info-circle fa-2x"></i>
                        <span class="nav-text">
                            Support
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
    </body>
</html>
