@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="mt-4">Tambah Course</h1> <!-- style="width: 30rem;" -->
<div>
<form action="{{ url('course') }}" method="POST" >
    @csrf
    <div class="form-group">
        <label>Nama Course</label>
        <input type="text" class="form-control" name="nama_course" placeholder="Masukkan Nama Course!">
    </div>
    <div class="form-group">
        <label>Harga Course</label>
        <input type="number" class="form-control" name="harga_course" placeholder="Masukkan Harga Course!">
    </div>
    <div class="form-group">
        <label>Perkiraan Waktu Belajar</label>
        <input type="text" class="form-control" name="perkiraan_waktu" placeholder="Masukkan Perkiraan Waktu Belajar Course!">
    </div>
    <div class="form-group">
        <label>Deskripsi Course</label>
        <textarea name="deskripsi_course" cols="2" rows="1" class="form-control" placeholder="Masukkan Deskripsi Course!" style="resize:none;"></textarea>
    </div>
    <div class="form-group">
        <label>Link Video (Opsional)</label>
        <input type="text" class="form-control" name="link_video" placeholder="Masukkan Link Video!">
    </div>
    <div class="form-group">
        <label>Isi Course</label>
        <textarea name="isi_course" id="editor" class="form-control" placeholder="Masukkan Isi Course!" style="resize:none;"></textarea>
    </div><br>                        
    <!-- <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_dibuat">
        </div><br/> -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection 
