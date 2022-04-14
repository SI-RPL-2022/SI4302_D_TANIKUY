@extends('layouts.main')
@section('container')
<h1 style="color: #579924;font-size: 50px;padding-left: 5%;padding-top: 3%"><b>Assessment</b></h1>
	<hr style="width: 90%;size: 3px" class="mx-auto">

	<br>
	<div class="card-group" style="width: 50%;padding-left: 5%">
	<div class="card" style="">
	  <img src="image/essay.png" alt="image" style="width:100%">
	  <div class="cardcontainer" style="padding-bottom: 1em">
	    <h4 style="padding-top: 5%"><b>Assessment Tani 1</b></h4> 
	    <p style="padding-top: 3%;padding-bottom: 5%"><i class="bi bi-bookmark"></i> Assessment ini bertujuan untuk mengukur sejauh mana materi yang disampaikan sudah dipahami</p>
	    <a href="{{url('/soal1')}}"><button class="btn btn-primary btn-block w-20" style="">Mulai</button></a>
	  </div>
	</div>
	<div class="card" style="">
	  <img src="image/essay.png" alt="Avatar" style="width:100%">
	  <div class="cardcontainer" style="padding-bottom: 1em">
	    <h4 style="padding-top: 5%"><b>Assessment Tani 2</b></h4> 
	    <p style="padding-top: 3%;padding-bottom: 5%"><i class="bi bi-bookmark"></i> Assessment ini bertujuan untuk mengukur sejauh mana materi yang disampaikan sudah dipahami</p>
	    <a href="{{url('/soal1')}}"><button class="btn btn-primary btn-block w-20" style="">Mulai</button></a>
	  </div>
	</div>
	<div class="card" style="">
	  <img src="image/essay.png" alt="Avatar" style="width:100%">
	  <div class="cardcontainer" style="padding-bottom: 1em">
	    <h4 style="padding-top: 5%"><b>Assessment Tani 3</b></h4> 
	    <p style="padding-top: 3%;padding-bottom: 5%"><i class="bi bi-bookmark"></i> Assessment ini bertujuan untuk mengukur sejauh mana materi yang disampaikan sudah dipahami</p>
	    <a href="{{url('/soal1')}}"><button class="btn btn-primary btn-block w-20" style="">Mulai</button></a>
	  </div>
	</div>
</div>
@endsection