@extends('layouts.main')
@section('container')
<div class="container d-flex" style='margin-top:1%;'>
    @foreach($mod as $mods)
    <div class="card" style="width: 20rem; margin-left: 15%; border-radius: 30px 30px; border: 2px solid #579924;">
        <img src="image/legogo.png" class="card-img-top" alt="..." style="width:80%; margin-left: 10%;">
        <div class="card-body">
            <h3 class="card-title" style="font-family: Times New Roman; font-size: 40px;">{{ $mods->nama_paket}}</h3>
            <h5 class="card-title" style="font-family: Times New Roman; font-size: 25px;">Rp. {{ $mods->harga_paket}}</h5>
            <a href="pilihpaket" type="button" class="btn btn-outline-success" style='width: 50%; margin: 5% 0 5% 25%;'>Get Started</a>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $mods->nama_course}}</li>
            </ul>
        </div>
    </div>
    @endforeach
    </div>
</div>
@endsection
