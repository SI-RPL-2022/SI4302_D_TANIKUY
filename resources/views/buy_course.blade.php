@extends('layouts.main')
@section('container')
<link href="sidebars.css" rel="stylesheet">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container" style="width: 100%; margin-top:2px;">
  <div class="container py-4">
    <div class="row align-items-md-stretch">
      <div class="col-md-3">
        <div class="h-100 p-3 text-white rounded-3" style="background: #579924">
          <ul class="list-unstyled ps-0">
              <li class="mb-1 ">
                <button class="btn btn-toggle align-items-center rounded collapsed text-light" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                  COURSE
                </button>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Overview</a></li>
                    <li><a href="#" class="link-light rounded">Updates</a></li>
                    <li><a href="#" class="link-light rounded">Reports</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed text-light" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                  EBOOK
                </button>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed text-light" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                  Orders
                </button>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed text-light" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                  Langganan
                </button>
              </li>
              <li class="border-top my-3"></li>
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed text-light" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    My Course
                  </button>
                </li>
          </ul>
        </div>
      </div>

      @foreach($datas as $row)
      <div class="col-md-9">
        <div class="h-100 p-5 bg-light border rounded-3">
          <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col-3">
              <div class="card" style="width: 15rem;">
                <img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title">{{$row->nama_course}}</h5>
                  <p class="card-text" style="color: #808080"><small>{{$row->harga_course}}</small></p>
                  <p class="card-text" style="color: #808080"><small>{{$row->perkiraan_waktu}}</small></p>                
                </div>
                <div class="card-footer">
                  <a href="riwayatBeli" class="btn btn-primary float-right" type="submit">Beli</a>
                </div>
              </div>
            </div>
            
            <!-- <div class="col-3">
              <div class="card" style="width: 15rem;">
                <img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">KELAS KEBUN</h5>
                  <p class="card-text" style="color: #808080"><small>Prof. Najendra Arzan</small></p>
                  <p class="card-text" style="color: #808080"><small>Rp150.000</small></p>                
                </div>
                <div class="card-footer">
                  <a href="riwayatBeli" class="btn btn-primary float-right" type="submit">Beli</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card h-100" style="width: 15rem;">
                <img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">KELAS SAWAH</h5>
                  <p class="card-text" style="color: #808080"><small>Prof. Najendra Arzan</small></p>
                  <p class="card-text" style="color: #808080"><small>Rp150.000</small></p>
                </div>
              <div class="card-footer">
                <a href="riwayatBeli" class="btn btn-primary float-right" type="submit">Beli</a>
              </div>
            </div> -->
            
          </div>
        </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</div>

@endsection