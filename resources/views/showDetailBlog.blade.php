@extends('layouts.main')

@section('extend-css')
<link href="{{asset('css/blog.css')}}" rel="stylesheet">  
@endsection

@section('container')
<div class="col-12 mt-4">          
    <a href="{{ url('/blog') }}" class="text-muted" style="font-size:16px; text-decoration:none;"><i class="fas fa-angle-double-left"></i> Kembali</a>
    <h3 class="fs-3 mt-3 fw-bold">{{ $mod->judul_blog }}</h3>
    <div class="text-muted mb-3" style="font-size:12px;">
        <?php             
            $waktu = date('d F Y, H:i:s', strtotime($mod->created_at)); 
        ?>
        {{ $waktu }}
    </div> 
    <div class="text-center">
        <img src="{{ asset('image/cover/'.$mod->cover) }}" class="img-fluid" style="width:400px;" alt="...">
    </div>    
    <div align="justify" class="mt-4">
        {!! $mod->isi_blog !!}
    </div>
</div>
@endsection