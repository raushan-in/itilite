<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Itilite</title>
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


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

    <script>
        function getDateTime(date_time){
            const months_list= ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            dt_array = date_time.split(" ");
            time = dt_array[1]
            date_str = dt_array[0]
            date_array = date_str.split("-");
            day = date_array[0]
            mnth = date_array[1]
            mnth_str = months_list[parseInt(mnth)-1]
            new_date = `${day} ${mnth_str}`
            return [new_date, time]
        }

        function timeConvert(n) {
            var num = n;
            var hours = (num / 60);
            var rhours = Math.floor(hours);
            var minutes = (hours - rhours) * 60;
            var rminutes = Math.round(minutes);
            const pul = rhours > 1 ? "hrs" : "hr";
            return `${rhours} ${pul} ${rminutes} mins`;
        }

        function getStar(num){
            return Array(num+1).join("★")
        }

    </script>
    
    </body>
   
</html>
