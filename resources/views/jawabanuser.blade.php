@extends('layouts.main')
@section('container')
<h1 style="font-size: 30px;padding-left: 0.1%;padding-top: 1%"><b>Assessment Tani 1</b></h1>


<div class="container d-flex justify-content-center" style='margin-top: 20px;'>
@csrf
<div class="card-body">
    <form action="{{url('/jawabanuser')}}" method="POST">
    <div class="row p-2 m-2">
        <label for="deskripsi" class="form-label">Nama Assessment</label>
        <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{$assessment->$nama_ass}}">
    </div>
    <div class="row p-2 m-2">
        <label for="soal" class="form-label">Soal</label>
        <input type="text" name="soal" id="soal" class="form-control" value="{{$assessment->$soal}}">
    </div>
    <div class="row p-2 m-2">
        <label for="soal" class="form-label">Jawaban</label>
        <input type="text" name="jawaban" id="jawaban" class="form-control" value="{{$assessment->$jawaban}}">
    </div>
    <div class="row p-2 m-2">
        <label for="soal" class="form-label">Nilai</label>
        <input type="text" name="nilai" id="nilai" class="form-control" value="{{$assessment->$nilai}}">
    </div>
    <button type="submit" class="btn btn-primary btn-md">Submit</button>
	</div>
    </form>
</div>
@endsection