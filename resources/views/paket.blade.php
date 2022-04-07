@extends('layouts.main')
@section('container')
<div class="container d-flex" style='margin-top: 5%; margin-left: 27%'>
    <div class="card" style="width: 18rem;">
        <img src="image/legogo.png" class="card-img-top" alt="..." style="width:80%; margin-left: 10%">
        <div class="card-body">
            <h3 class="card-title" style="">FREE</h3>
            <h5 class="card-title">Card title</h5>
        </div>
            <button type="button" class="btn btn-secondary" style='width: 50%; margin-left:25%; margin-bottom:5%'>Get Started</button>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
    </div>
    <div class="card" style="width: 18rem; margin-left: 5%;">
        <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
    </div>
</div>
@endsection