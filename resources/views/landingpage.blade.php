<html>
        <head>
            <title>

            </title> 
            <style>
                .btn-primary {
                    color: #8E6A4A; 
                }
            </style>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">     
            <script src="https://kit.fontawesome.com/b198f4fad2.js" crossorigin="anonymous"></script>        
        </head>
        <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{'/'}}">
            <img src="/image/logotani.png" alt="" width="120" height="45" class="d-inline-block align-text-top" style="margin-left:25px;">
            </a>
            <ul class="nav justify-content-end">
                @guest 
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-brands fa-whatsapp fa-2xl" style="margin-top: 10px; color:green;"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:black;">Hubungi kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{'register'}}" style="color:black;">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{'login'}}" style="color:black;">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#"><i class="fa-solid fa-magnifying-glass fa-2xl" style="color:black; margin-top: 10px;"></i></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-brands fa-whatsapp fa-2xl" style="margin-top: 10px; color:green;"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:black;">Hubungi kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('siswa/dashboard') }}" style="color:black;">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" 
                                                     style="color:black;">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#"><i class="fa-solid fa-magnifying-glass fa-2xl" style="color:black; margin-top: 10px;"></i></a>
                </li>
                @endguest
            </ul>
        </div>
        </nav>
    <body id="example2" style="background-image:url('image/tanikuy.png'); background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="container" align="center" style="margin-top:180px;" >
        <h1 class="text-center" style="color:white;">#Ayo Majukan Pertanian</h1>
        <h1 class="text-center" style="color:white;">INDONESIA!</h1>
        </div>
        <div align="center" style="margin-top:25px;">
        <a href="{{ url('siswa/buy_paket') }}" type="button" class="btn btn-outline-light ms-2 me-2" style="height:35px; width: 80px;">Paket</a>
        <a href="{{ url('siswa/buy_course') }}" type="button" class="btn btn-outline-light ms-2 me-2" style="height:35px; width: 80px;">Course</button>
        <a href="" type="button" class="btn btn-outline-light ms-2 me-2" style="height:35px; width: 80px;">Blog</a>
        </div>
    </body>
</html>