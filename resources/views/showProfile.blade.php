@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-2 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">My</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Profile</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">
  @include('layouts.sidebarSiswa')
  <div class="col-md-9">
    <div class="h-100 p-3 bg-light border rounded-3">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('image/profile/'. Auth::user()->foto_profile) }}" class="rounded-circle" width="100%">            
            </div>
            <div class="col-8">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                        {{ session('error') }}
                    </div>                                                            
                @endif   
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                        {{ session('success') }}
                    </div>                                                            
                @endif   
                <form action="{{ url('siswa/profile/update/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-1">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control form-control-sm" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control form-control-sm" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control form-control-sm" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Phone</label>
                        <input type="text" pattern="\d*" maxlength="13" name="phone" min=1 class="form-control form-control-sm" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control form-control-sm" value="{{ Auth::user()->city }}">
                    </div>
                    <div class="form-group mb-1">
                        <label for="">Photo Profile</label>
                        <input type="file" name="foto_profile_new" class="form-control form-control-sm">
                        <input type="text" name="foto_profile" value="{{ Auth::user()->foto_profile }}" hidden>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-success">Save Profile</button>
                        <a href="{{ url('siswa/profile/edit-password/'.Auth::user()->id) }}" class="btn btn-sm btn-warning">Change Pasword</a>                        
                    </div>
                </form>
            </div>
        </div>                     
    </div>
  </div>
</div>
@endsection