@extends('layouts.main')
@section('container')
<h1 style="font-size: 30px;padding-left: 0.1%;padding-top: 1%"><b>Assessment Tani 1</b></h1>


<div class="container d-flex justify-content-center" style='margin-top: 20px;'>

<div class="card" style="width: 40%; margin-bottom: 5px;">
  <div class="card-body">
    <h5 class="card-title">{{$key->pertanyaan}}</h5>
    <p class="card-text">
    <textarea id="jawaban" name="jawaban" rows="4" cols="50" class="textareajawab" placeholder="Silahkan isi sepengetahuan anda"></textarea>
<a href="{{url('/submit')}}"><button class="btn btn-primary btn-md">Submit</button></a>
@endsection