@extends('layouts.main')
@section('container')
<h1 style="color: #579924;font-size: 50px;padding-left: 5%;padding-top: 3%"><b>Assessment</b></h1>
	<hr style="width: 90%;size: 3px" class="mx-auto">

	<br>
	@if (count($assessment) < 1) 
	<div class="px-5 text-center" style="margin-top:5rem; padding-top:10rem; padding-bottom:10rem;">
	    <h3>Belum ada Assessment yang tersedia</h3>
	</div>
	@endif
	@foreach($assessment as $row)
	<div class="container d-flex justify-content-start" style="padding-left: 5%">
	<div class="card" style="">
	  <img src="{{ asset('image/essay.png') }}" alt="image" style="width:500px">
	  <div class="cardcontainer" style="">
	    <h4 class="mb-2"><b>{{$row->nama_ass}}</b></h4> 
	    <p class="mb-2"><i class="bi bi-bookmark"></i>{{$row->deskripsi}}</p>
	    <a href="{{ url('siswa/soal/'.$row->id_assessments) }}"><button class="btn btn-primary btn-block w-20" style="">Mulai</button></a>
	  </div>
	</div>
	@endforeach
	



@endsection