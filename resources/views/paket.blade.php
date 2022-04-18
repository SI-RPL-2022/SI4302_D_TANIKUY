@extends('layouts.main')
@section('container')
<div class="container d-flex" style='margin-top:1%;'>
    <div class="card" style="width: 22rem; margin-left: 25%; border-radius: 30px 30px; border: 2px solid #579924;">
        <img src="image/legogo.png" class="card-img-top" alt="..." style="width:80%; margin-left: 10%;">
        <div class="card-body">
            <h3 class="card-title" style="font-family: Times New Roman; font-size: 40px;">FREE</h3>
            <h5 class="card-subtitle" style="font-size: 18px;">Rp.95.000</h5>
        
            <button type="button" class="btn btn-outline-success" style='width: 50%; margin: 5% 0 5% 25%;'>Current Plan</button>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Lorem Ipsum</li>
                <li class="list-group-item">Lorem Ipsum</li>
                <li class="list-group-item">Lorem Ipsum</li>
            </ul>
        </div>
    </div>
    <div class="card" style="width: 22rem; margin-left:5%; border-radius: 30px 30px; border: 2px solid #579924;">
        <img src="image/legogo.png" class="card-img-top" alt="..." style="width:80%; margin-left: 10%;">
        <div class="card-body">
            <h3 class="card-title" style="font-family: Times New Roman; font-size: 40px;">PREMIUM</h3>
            <h4 class="card-subtitle" style="font-size: 18px;">Rp.95.000</h4>
        
            <button type="button" class="btn btn-outline-success" style='width: 50%; margin: 5% 0 5% 25%;'>Get Started</button>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Lorem Ipsum</li>
                <li class="list-group-item">Lorem Ipsum</li>
                <li class="list-group-item">Lorem Ipsum</li>
            </ul>
        </div>
    </div>
    </div>
</div>
@endsection