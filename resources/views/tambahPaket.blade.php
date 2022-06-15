@extends('layouts.admin')
@section('container')
                <!-- Page content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard Admin</h1> <!-- style="width: 30rem;" -->
                    <div>
                    <form action="{{ url('postPaket') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" id="">                        
                        <label>List Course</label>
                        <select multiple="" class="form-select" name="nama_course[]">
                            @foreach($mod as $mods)
                            <option value="{{ $mods->nama_course }}">{{ $mods->nama_course }} (Rp.{{ $mods->harga_course }})</b></option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="number" min=0 class="form-control" name="harga_paket" placeholder="Harga Paket">
                        </div><br/>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>            
@endsection