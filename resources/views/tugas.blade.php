@extends('layouts.main')
@section('container')
<h1 style="color: #579924;font-size: 50px;padding-left: 5%;padding-top: 3%"><b>Assessment</b></h1>
	<hr style="width: 90%;size: 3px" class="mx-auto">

	<br>
	@if ($assessment > 0)
	@foreach($assessment as $row)
	<div class="card-group" style="width: 50%;padding-left: 5%">
	<div class="card" style="">
	  <img src="image/essay.png" alt="image" style="width:100%">
	  <div class="cardcontainer" style="padding-bottom: 1em">
	    <h4 style="padding-top: 5%"><b>{{$row->nama_ass}}</b></h4> 
	    <p style="padding-top: 3%;padding-bottom: 5%"><i class="bi bi-bookmark"></i>{{$row->deskripsi}}</p>
	    <a href="{{url('/soal')}}"><button class="btn btn-primary btn-block w-20" style="">Mulai</button></a>
	  </div>
	</div>
	@endforeach
	@else 
	<div class="px-5 text-center" style="margin-top:5rem; padding-top:10rem; padding-bottom:10rem;">
	    <h3>Belum ada Assessment yang tersedia</h3>
	</div>
	
	@endif


@endsection