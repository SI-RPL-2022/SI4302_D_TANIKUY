@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-3">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">Keluhan</span>
      </a>
    </header>
    </div>

    <div class="h-400 p-3 bg-light border rounded-3">
        <a class="btn btn-info" href="{{ url('create-keluhan') }}">Masukkan Keluhan</a>
        <table class="table-bordered table">
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Keluhan</th>
            </tr>

            @foreach ($x as $dataKeluhan)
            <tr>
                <td>{{ $dataKeluhan->nama}}</td>
                <td>{{ $dataKeluhan->email}}</td>
                <td>{{ $dataKeluhan->keluhan}}</td>
            </tr>
            @endforeach

          </table>
    </div>

</div>

@endsection
