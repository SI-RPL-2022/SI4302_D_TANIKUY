@extends('layouts.main')

@section('extend-css')
<link href="{{asset('css/blog.css')}}" rel="stylesheet">  
<style>
    .fit-cover {
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .fit-cover {
            position: absolute;
        }
    }
</style> 
@endsection

@section('carousel-data')
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://perkebunan.org/storage/images/articles/lsDKuIhHKOEUJ772uRVT8aBxvYSpsF9DwUuiD2Tv.jpg" style="min-height: 350px; max-height: 350px; object-fit: cover;" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="https://disk.mediaindonesia.com/thumbs/1800x1200/news/2019/04/76c6d947bbb1ca8d4f716a36c144f724.jpeg" style="min-height: 350px; max-height: 350px; object-fit: cover;" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="http://assets.kompasiana.com/items/album/2016/06/21/membahas-potensi-sumber-daya-pertanian-indonesia-5768e765917e61290610de28.jpg" style="min-height: 350px; max-height: 350px; object-fit: cover;" class="d-block w-100">
        </div>
    </div>
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endsection

@section('container')
<div class="col-12 mt-5">      
    <div class="row">        
        <div class="col-12 col-lg-9">
            @foreach($mod as $mods)
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-4 position-relative">
                            <img src="{{ asset('image/cover/'.$mods->cover) }}" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="link-dark text-decoration-none fw-bold" style="font-size:18px;">{{ $mods->judul_blog }}</div>
                                </h5>
                                <div align="justify">
                                    <div class="card-text" style="font-size:13px;">{!! $mods->isi_singkat !!}.....</div>                        
                                </div>
                                <div class="text-muted" style="font-size:12px;">
                                    <?php 
                                        $waktu = date('d F Y', strtotime($mods->created_at)); 
                                    ?>
                                    {{ $waktu }}
                                </div>                            
                            </div>                        
                        </div>
                        <div class="col-sm-1">
                            <div class="p-4">
                                <a href="{{ url('blog/'.$mods->slug) }}" style="text-decoration:none; color:black; font-size:18px;"><i class="fas fa-angle-double-right"></i></a>                            
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>            
            @endforeach
            <div class="mt-2">{{ $mod->links() }}</div>            
        </div>            
        <div class="col-12 col-lg-3">               
            <form action="{{ url('blog/cari') }}" method="get" style="color: #555; display: flex; border-radius: 5px;">                        
                <input type="text" name="search" placeholder="Search Blog">
                <button id="submit" type="submit">Search</button>
            </form>                    
            <div class="card mt-3 mb-3" style="background-color:#f7f6f6;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size:16px;">Kategori</h5>
                </div>                
                <ul class="list-group list-group-flush" >
                    <li class="list-group-item" style="background-color:#f7f6f6;">
                        <form action="{{ url('blog/cari-kategori') }}" method="get">
                            <input type="text" name="search_kategori" value="Perkebunan" hidden>
                            <button style="text-decoration:none; border: none; background: none; font-size:12px;" type="submit">Perkebunan</button>                        
                        </form>                    
                    </li>
                    <li class="list-group-item" style="background-color:#f7f6f6;">
                        <form action="{{ url('blog/cari-kategori') }}" method="get">
                            <input type="text" name="search_kategori" value="Pertanian" hidden>
                            <button style="text-decoration:none; border: none; background: none; font-size:12px;" type="submit">Pertanian</button>                        
                        </form>                    
                    </li>
                    <li class="list-group-item" style="background-color:#f7f6f6;">
                        <form action="{{ url('blog/cari-kategori') }}" method="get">
                            <input type="text" name="search_kategori" value="Produk Tani" hidden>
                            <button style="text-decoration:none; border: none; background: none; font-size:12px;" type="submit">Produk Tani</button>                        
                        </form>                    
                    </li>
                    <li class="list-group-item" style="background-color:#f7f6f6;">
                        <form action="{{ url('blog/cari-kategori') }}" method="get">
                            <input type="text" name="search_kategori" value="Obat-Obatan" hidden>
                            <button style="text-decoration:none; border: none; background: none; font-size:12px;" type="submit">Obat-Obatan</button>                        
                        </form>                    
                    </li>                    
                </ul>                
            </div>
            <h6 class="fw-bold">INFORMASI TERKINI</h6>
            @foreach($informasi_terkini as $item)
            <div class="card mb-1">
                <div class="row g-0">
                    <div class="col-sm-4 position-relative">
                        <img src="{{ asset('image/cover/'.$item->cover) }}" class="card-img fit-cover w-100 h-100" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="link-dark text-decoration-none fw-bold" href="{{ url('blog/'.$mods->slug) }}" style="font-size:12px;">{{ $item->judul_blog }}</a>
                            </h6>
                            <div align="justify">
                                <div class="card-text" style="font-size:10px;">{!! $item->isi_singkat !!}.....</div>                        
                            </div>                            
                        </div>                        
                    </div>                    
                </div>
            </div>
            @endforeach
        </div>        
    </div>           
</div>
@endsection