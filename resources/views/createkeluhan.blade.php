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
      <form action="{{ url('/siswa/keluhan/store') }}" method="POST" class="form" style="size: 5ch">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="{{ Auth::user()->name }}" readonly>
          <input type="text" class="form-control form-control-sm" id="nama" name="id_user" value="{{ Auth::user()->id }}" hidden>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Keluhan</label>
            <textarea name="isi_keluhan" class="form-control form-control-sm" style="resize:none;" rows="2"></textarea>
          </div><br>
        <button type="submit" class="btn btn-sm btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection