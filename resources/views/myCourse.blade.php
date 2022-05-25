@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-4 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">My</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Course</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">
  @include('layouts.sidebarSiswa')
  <div class="col-md-9">
    <div class="h-100 p-3 bg-light border rounded-3">      
      <table class="table">
        <thead>
            <tr>
                <td>No</td>                
                <td>Nama Course</td>
                <td>Tanggal Rilis</td>                                
                <td>Perkiraan Waktu</td>                
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td><a style="text-decoration:none; color:black;" href="{{ url('siswa/mycourse/'.$mods->nama_course.'/'.$mods->id_course.'/'.$mods->id_user) }}">{{ $mods->nama_course }}</a></td>
                <td>{{ $mods->created_at }}</td>
                <td>{{ $mods->perkiraan_waktu }} Jam</td>
            </tr>  
            @endforeach                                  
        </tbody>
    </table>
    </div>
  </div>
</div>
@endsection