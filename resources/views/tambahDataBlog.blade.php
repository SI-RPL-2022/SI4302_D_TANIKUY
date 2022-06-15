@extends('layouts.admin')
@section('container')
<a href="{{ url('admin/blog') }}" class="btn btn-sm btn-danger mt-2"><i class="fas fa-angle-double-left"></i></a>
<form action="{{ url('admin/blog/post') }}" enctype="multipart/form-data" method="post" class="mt-2">
    @csrf
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Judul Blog</label>
        <div class="col-sm-10">
            <input type="text" name="judul_blog" class="form-control form-control-sm" >
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <select name="kategori" class="form-select form-select-sm">
                <option value="Perkebunan">Perkebunan</option>
                <option value="Pertanian">Pertanian</option>
                <option value="Produk Tani">Produk Tani</option>
                <option value="Obat-Obatan">Obat-Obatan</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Isi Blog</label>
        <div class="col-sm-10">
            <textarea name="isi_blog" id="editor" class="form-control form-control-sm"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" name="cover" class="form-control form-control-sm">
        </div>
    </div>       
    <div class="row mb-3">
        <div class="col-sm-2"><input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden> </div>         
        <div class="col-sm-10">
            <button type="submit" class="btn btn-sm btn-success">Post</button>
        </div>
    </div>       
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