@extends('layouts.main')
@section('container')
<h1 style="font-size: 30px;padding-left: 0.1%;padding-top: 1%"><b>Assessment Tani 1</b></h1>


<div class="container d-flex justify-content-center" style='margin-top: 20px;'>

<div class="card" style="width: 40%; margin-bottom: 5px;">
  <div class="card-body">
  	<form action="{{url('/soal')}}" method="POST">
  	@csrf
  	<input type="hidden" name="assessments_id" value="{{$assessment->id}}">
    <h5 class="card-title">{{$assessment->soal}}</h5>
    <input type="hidden" name="soal" value="{{$assessment->soal}}">
    <textarea id="jawaban" name="jawaban" rows="4" cols="50" class="textareajawab" placeholder="Silahkan isi sepengetahuan anda"></textarea>
	<a href="{{url('/submit')}}"><button class="btn btn-primary btn-md">Submit</button></a>
	</form>
  </div>
</div>
@endsection