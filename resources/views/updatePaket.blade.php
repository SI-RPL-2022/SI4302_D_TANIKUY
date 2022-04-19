@extends('layouts.admin')
@section('container')
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard Admin</h1> <!-- style="width: 30rem;" -->
                    <div>
                    <form action="{{ url('updatePaket/'.$paket->id_paket) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <label>Nama Paket</label>
                        <select class="form-select" aria-label="Default select example" name="nama_paket">
                            <option value="Free" {{$paket->nama_paket == "Free" ? 'selected' : ''}}>Free</option>
                            <option value="Premium" {{$paket->nama_paket == "Premium" ? 'selected' : ''}}>Premium</option>
                        </select>
                        <label>List Course</label>
                        <input type="text" value="{{ $paket->nama_course }}" name="nama_course_old" hidden>
                        <select multiple="" class="form-select" name="nama_course[]">
                            @foreach($mod as $mods)
                            <option value="{{ $mods->nama_course }}">{{ $mods->nama_course }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="text" class="form-control" name="harga_paket" value="{{$paket->harga_paket}}" placeholder="Harga Paket">
                        </div><br/>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
@endsection        