@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-3 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">Data</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Keluhan</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">
  @include('layouts.sidebarSiswa')
  <div class="col-md-9">
    <div class="h-100 p-3 bg-light border rounded-3">      
      <a href="{{ url('siswa/keluhan/create') }}" class="btn btn-sm btn-primary mb-3">Tambah Keluhan</a>
      <table class="table">
        <thead>
            <tr>
                <td>No</td>                                
                <td>Alamat Email</td>      
                <td>Isi Keluhan</td>                                          
                <td>Tanggal Kirim</td>                
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->email }}</td>
                <td>{{ $mods->isi_keluhan }}</td>
                <td>{{ $mods->created_at }}</td>                
            </tr>  
            @endforeach                                  
        </tbody>
    </table>
    </div>
  </div>
</div>
@endsection
