@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-3 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">Beli</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Course</a> 
    <hr>
  </h2>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
  @foreach($datas as $row)
  <div class="col">
    <div class="card h-100 rounded">
      <img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title fw-bold">{{$row->nama_course}}</h5>
        <p class="card-text" style="color: #808080"><small>Rp.{{$row->harga_course}} / {{$row->perkiraan_waktu}}</small></p>        
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card-footer text-center">        
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#belicoure__{{ $row->id_course }}">
          Beli Sekarang
        </button>        
        <div class="modal fade" id="belicoure__{{ $row->id_course }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beli Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                Apakah anda yakin ingin membeli course tersebut?                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('siswa.store.transaction.course') }}" method="post">
                @csrf
                  <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                  <input type="text" name="id_course" value="{{ $row->id_course }}" hidden>
                  <button type="submit" class="btn btn-success btn-sm">Konfirmasi Pembayaran</button>
                </form>                 
              </div>
            </div>
          </div>
        </div>        
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