@extends('layouts.main')
@section('container')

<div class="flex-shrink-0 p-3 bg-white" style="width: 240px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Collapsible</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Dashboard
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Weekly</a></li>
            <li><a href="#" class="link-dark rounded">Monthly</a></li>
            <li><a href="#" class="link-dark rounded">Annually</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Orders
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New</a></li>
            <li><a href="#" class="link-dark rounded">Processed</a></li>
            <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New...</a></li>
            <li><a href="#" class="link-dark rounded">Profile</a></li>
            <li><a href="#" class="link-dark rounded">Settings</a></li>
            <li><a href="#" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>


<div class="container" style="width: 80%; margin-top:2px;">
    <div class="row">
        <div class="col-sm">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://dbijapkm3o6fj.cloudfront.net/resources/3866,1004,1,6,4,0,600,450/-4608-/20210506215542/meetings.jpeg" alt="Ciputra">
            <div class="card-body">
                <h5 class="card-title">Budidaya Hidroponik</h5>
                <p class="card-text" style="color: #808080"><small>Prof. Haikal Terra</small></p>
                <p class="card-text" style="color: #808080"><small>Rp150.000</small></p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://d21bklzz9tc7ug.cloudfront.net/shrine/venuephotos/26681/gandaria-city-hall-sewa-function-room-jakarta-selatan-large.jpg" alt="Gandaria">
            <div class="card-body">
                <h5 class="card-title">Budidaya Kangkung</h5>
                  <p class="card-text" style="color: #808080"><small>Prof. Najendra Arzan</small></p>
                  <p class="card-text" style="color: #808080"><small>Rp150.000</small></p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://hardaparamasentosa.com/images/user_upload/products/5b987d226770e.jpg" alt="Harda Parama">
            <div class="card-body">
                <h5 class="card-title">Hama Sayuran</h5>
                <p class="card-text" style="color: #808080"><small>Prof.Kevan Mahesa</small></p>
                <p class="card-text" style="color: #808080"><small>Rp150.000</small></p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
            </div>
        </div>
    </div>
</div>

@endsection