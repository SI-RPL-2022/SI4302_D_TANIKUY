@extends('layouts.main')
@section('container')
<h1 style="font-size: 30px;padding-left: 0.1%;padding-top: 1%"><b>Assessment Tani 1</b></h1>


<div class="container d-flex justify-content-center" style='margin-top: 20px;'>

<div class="card" style="width: 40%; margin-bottom: 5px;">
  <div class="card-body">
  	<form action="{{ url('siswa/soal/store') }}" method="POST">
  	@csrf
  	<input type="hidden" name="id_assessments" value="{{$assessment->id_assessments}}">
    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
    <h5 class="card-title">{{$assessment->soal}}</h5>    
    <textarea id="jawaban" name="deskripsi_jawaban" rows="4" cols="50" class="textareajawab" placeholder="Silahkan isi sepengetahuan anda"></textarea>
	  <button type="submit" class="btn btn-primary btn-md">Submit</button>
	</form>
  </div>
</div>
@endsection