<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Itilite</title>
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">


        <script src="{{ asset('assets/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
       
    </head>
    <body>
  
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/photo/itilite-logo-1.png') }}" width="80" height="20" alt="">
       </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('flight') }}">Flight</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('hotel') }}">Hotel</a>
        </li>
  </ul>
    </nav>

    @yield('content')
    
    </body>
   
</html>
