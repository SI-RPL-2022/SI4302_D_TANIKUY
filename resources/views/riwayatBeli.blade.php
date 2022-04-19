@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-3">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">RIWAYAT PEMBELIAN</span>
      </a>
    </header>
    
    </div>
    <div class="container" style="width: 100%; margin-top:2px;">
      <div class="container py-4">
        <div class="row align-items-md-stretch">
          <div class="col-md-3">
            <div class="h-100 p-3 text-white rounded-3" style="background: #579924">
              <ul class="list-unstyled ps-0">
              <li class="mb-1 ">
                <a class="btn btn-toggle align-items-center rounded collapsed text-light" href="{{ route('siswa.buy.course') }}" > Course
                </a>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Overview</a></li>
                    <li><a href="#" class="link-light rounded">Updates</a></li>
                    <li><a href="#" class="link-light rounded">Reports</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <a class="btn btn-toggle align-items-center rounded collapsed text-light" href="{{ url('siswa/tugas') }}">
                  Assesment
                </a>
              </li>
              <li class="mb-1">
                <a class="btn btn-toggle align-items-center rounded collapsed text-light" href="{{ url('siswa/tugas/jawaban') }}">
                  Hasil Assessment
                </a>
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

          <div class="col-md-9">
            <div class="h-100 p-5 bg-light border rounded-3">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Course</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Perkiraan Waktu</th>
                    <th scope="col">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($data as $datas)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $datas->nama_course }}</td>
                    <td>{{ $datas->created_at }}</td>
                    <td>{{ $datas->perkiraan_waktu }}</td>
                    <td>{{ $datas->harga_course }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

@endsection