@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-2 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">Beli</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Paket</a> 
    <hr>
  </h2>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($datas as $row)
    <div class="col-3">
        <div class="card" style="border-radius: 30px 30px; border: 2px solid #579924;">
            <center><img src="{{ asset('image/legogo.png') }}" class="card-img-top text-center" alt="..." style="width:50%;"></center>
            <div class="card-body">
                <h3 class="card-title" style="font-family: Times New Roman; font-size: 22px;">{{ $row->nama_paket}}</h3>
                <h5 class="card-title" style="font-family: Times New Roman; font-size: 17px;">Rp. {{ $row->harga_paket}}</h5>                
                <button type="button" style='width: 50%; margin: 3% 0 3% 23%;' class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#belicoure__{{ $row->id_paket }}">
                Beli Sekarang
                </button>        
                <div class="modal fade" id="belicoure__{{ $row->id_paket }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Beli Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Apakah anda yakin ingin membeli paket tersebut?                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <form action="{{ url('siswa/store_paket') }}" method="post">
                        @csrf
                        <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                        <input type="text" name="id_paket" value="{{ $row->id_paket }}" hidden>
                        <button type="submit" class="btn btn-success btn-sm">Konfirmasi Pembayaran</button>
                        </form>                 
                    </div>
                    </div>
                </div>
                </div>  
                <ul class="list-group list-group-flush" style="font-family: Times New Roman; font-size: 15px;">
                    <li>Paket Terdiri Dari Course : </li>
                    <li class="list-group-item text-muted">{{ $row->nama_course}}</li>
                </ul>
            </div>
        </div>
    </div>    
    @endforeach
</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection