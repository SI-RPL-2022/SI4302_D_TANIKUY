@extends('layouts.main')
@section('container')
<div class="container d-flex justify-content-center" style='margin-top: 20px;'>

<div class="card" style="width: 40%; margin-bottom: 5px;">
  <form action="{{url('/buatsoal')}}" method="POST">
@csrf
  <div class="card-body">
    <div class="row p-2 m-2">
        <label for="nama_ass" class="form-label">Nama Assessemt</label>
        <input type="text" name="nama_ass" id="nama_ass" class="form-control">
    </div>
    <div class="row p-2 m-2">
        <label for="pertanyaan" class="form-label">Pertanyaan</label>
        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-md">Submit</button>
	</div>
    </form>
</div>


@endsection