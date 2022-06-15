@extends('layouts.admin')
@section('container')
<form action="{{ url('admin/blog/update/'.$mod->id_blog) }}" enctype="multipart/form-data" method="post" class="mt-2">
    @csrf
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Judul Blog</label>
        <div class="col-sm-10">
            <input type="text" name="judul_blog" value="{{ $mod->judul_blog }}" class="form-control form-control-sm" >
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <select name="kategori" class="form-select form-select-sm">
                <option value="Perkebunan" {{ $mod->kategori == "Perkebunan" ? 'selected' : '' }}>Perkebunan</option>   
                <option value="Pertanian" {{ $mod->kategori == "Pertanian" ? 'selected' : '' }}>Pertanian</option>   
                <option value="Produk Tani" {{ $mod->kategori == "Produk Tani" ? 'selected' : '' }}>Produk Tani</option>   
                <option value="Obat-Obatan" {{ $mod->kategori == "Obat-Obatan" ? 'selected' : '' }}>Obat-Obatan</option>                   
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Isi Blog</label>
        <div class="col-sm-10">
            <textarea name="isi_blog" id="editor" class="form-control form-control-sm">{{ $mod->isi_blog }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="text" name="cover" value="{{ $mod->cover }}" hidden> 
            <input type="file" name="cover_new" class="form-control form-control-sm">
        </div>
    </div>       
    <div class="row mb-3">
        <div class="col-sm-2"><input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden> </div>         
        <div class="col-sm-10">
            <button type="submit" class="btn btn-sm btn-warning">Ubah</button>
            <a href="{{ url('admin/blog') }}" class="btn btn-sm btn-danger">Kembali</a>
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