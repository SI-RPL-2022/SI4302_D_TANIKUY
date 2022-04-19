<!DOCTYPE html>
<html lang="en">
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanikuy</title>
  <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
  <link rel="stylesheet" href= "{{ asset('css/tugasstyle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>


@include('partials.navbar');
<div class="container">
	@yield('container')
</div>

</body>
</html>
