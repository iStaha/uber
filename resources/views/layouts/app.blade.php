<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <script
  src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

      <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style type="text/css">  

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            .table>thead>tr>th {
             text-align: center;
}

.head {
    background: #7a1632;
    color: white;
    border-radius: 50%;
    padding: 4px;
    display: inline-block;
    width: 27px;
    text-align: center;
}

.tal{
    text-align: left;
}

.tac{
    text-align: center;
    display: inline-block;
    cursor: pointer;
}

  h4 {
            font-family: 'Courgette', cursive;
        }

</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       Uber
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                      @guest

                         @else
                    <ul class="nav navbar-nav">
                       
                         <li><a href="/home">Home</a></li>
                        <li><a href="/book">Book</a></li>
                        <li><a href="/bookings">Bookings</a></li>

                    </ul>
                  

                      @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script
  src="{{ asset('js/jscrip.js') }}"></script>
    <script type="text/javascript">
    
/*
   var  optional_config={ dateFormat: "Y-m-d"}
    $(document).ready(function(){
    $(".date").flatpickr(optional_config);
    })*/

    
    
 flatpickr(".date", { 
    dateFormat: "Y-m-d",
 
});

  flatpickr(".dater", { 
    dateFormat: "Y-m-d",
 
});


    flatpickr(".d", { 
    dateFormat: "Y-m-d",
});


    flatpickr(".time", { 
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});

      flatpickr(".tim", { 
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});



   
</script>

</body>
</html>
