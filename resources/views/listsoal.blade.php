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
            <th>Soal</th>

        </tr>
    </thead>
    <tbody>
        @php
        $num = 1;
        @endphp
        @foreach($assessment as $key)
        <tr>
            <td>{{$num}}</td>
            <td>{{$key->nama_ass}}</td>
            <td>{{$key->deskripsi}}</td>
            <td>{{$key->soal}}</td>
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
            <td>
                <form action="/jawabanuser/{{$key->id}}" method="POST">
                @csrf 
                <button type="submit" class="btn btn-outline-primary">VIEW</button>
                </form>
            </td>
        </tr> 
        @php
        $num++;
        @endphp 
        @endforeach    
    </tbody>
</table>
@endsection