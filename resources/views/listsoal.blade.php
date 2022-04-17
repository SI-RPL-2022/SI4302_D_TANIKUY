@extends('layouts.main')
@section('container')
<div class="col-md-12 bg-light text-right">
	<a href="{{url('/buatsoal')}}"><button type="button" class="btn btn-outline-primary" style="">+ Create New Assessment</button></a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Assessment</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assessment as $key)
        <tr>
            <td>{{$key->id}}</td>
            <td>{{$key->nama_ass}}</td>
            <td>{{$key->deskripsi}}</td>
            <td>
                <form action="/editsoal/{{$key->id}}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-outline-warning">EDIT</button>
                </form>
            </td>
            <td>
            	<form action="/listsoal2/{{$key->id}}" method="delete">
                @csrf @method('DELETE')
            	<button type="submit" class="btn btn-outline-danger">DELETE</button>
                </form>
            </td>
        </tr>  
        @endforeach    
    </tbody>
</table>
@endsection