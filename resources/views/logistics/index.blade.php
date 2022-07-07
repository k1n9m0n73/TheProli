<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEPROLI | NIGERIA</title>
    @include('logistics.header.header')

</head>
<body>
<div class="flex-center position-ref full-height">
          <?php
           // echo "<pre>";
            // print_r(get_class_methods(new Route()));
            // print_r(Auth::user());
            //var_dump($data)
           // echo "</pre>";
          ?>
            <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout {{$user['fn']}}</a>
                    </li>
                    @endguest
                </ul>


 
</body> 
@include('logistics.footer.footer')
</html>