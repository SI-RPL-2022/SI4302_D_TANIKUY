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
  <script src="https://kit.fontawesome.com/f1223f01a6.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>


@include('partials.navbar')
<div class="container">
	@yield('container')
</div>

</body>
</html>
