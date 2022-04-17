@extends('layouts.main')
@section('container')
<h1 style="font-size: 30px;padding-left: 0.1%;padding-top: 1%"><b>Assessment Tani 1</b></h1>


<div class="container d-flex justify-content-center" style='margin-top: 20px;'>

<div class="card-body">
    <div class="row p-2 m-2">
        <label for="nama_ass" class="form-label">Nama User</label>
        <input type="text" name="nama_ass" id="nama_ass" class="form-control" value="{{$assessment->users_id}}">
    </div>
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
        <input type="text" name="soal" id="soal" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-md">Submit</button>
	</div>
    </form>
</div>
@endsection