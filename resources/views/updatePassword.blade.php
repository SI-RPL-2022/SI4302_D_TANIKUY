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
    <div class="h-60 p-3 bg-light border rounded-3">
        <div class="row">            
            <div class="col-12">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                        {{ session('error') }}
                    </div>                                                            
                @endif   
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                        
                        {{ session('success') }}
                    </div>                                                            
                @endif   
                <form action="{{ url('siswa/profile/update-password/'.$mod->id) }}" method="post" enctype="multipart/form-data">
                    @csrf                    
                    <div class="form-group mb-1">
                        <label for="">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control form-control-sm">
                        @error('password_lama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                        
                    </div>                                            
                    <div class="form-group mb-1">
                        <label for="">Password Baru</label>
                        <input type="password" name="password" class="form-control form-control-sm">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                                            
                    <div class="form-group mb-3">
                        <label for="">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-sm">
                    </div>    
                    <a href="{{ url('siswa/profile') }}" class="btn btn-sm btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>                                                                                                                                                               
                </form>
            </div>
        </div>                     
    </div>
  </div>
</div>
@endsection