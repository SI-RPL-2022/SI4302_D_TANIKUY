@extends('layouts.admin')
@section('container')
    <a class="btn btn-info" href="{{ route('admin.tambahPaket') }}">Add Package</a>
    <br>
    <table class="table-bordered table">
        <tr>
            <th>Nama Paket</th>
            <th>List Course</th>
            <th>Harga Paket</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($datap as $key=>$val)
        <tr>
            <td>{{ $val->nama_paket}}</td>
            <td>{{ $val->nama_course}}</td>
            <td>{{ $val->harga_paket}}</td>
            <td><a class="btn btn-info" href="{{ url('editPaket/'.$val->id_paket) }}">Update</a></td>
            <td><a href="{{ url('deletePaket/'.$val->id_paket) }}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
    </table>
@endsection
