<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/84b0a98db8.js" crossorigin="anonymous"></script>
    </head>
    <body>


@include('partials.navbaradmin')
<div class="container">
    @yield('container')
</div>
</body>
</html>
