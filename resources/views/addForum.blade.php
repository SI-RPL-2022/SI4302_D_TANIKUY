@extends('layouts.main')

@section('container')
    <div class="col-7 col-lg-3">
        <h2 class="fw-bold" style="font-size:35px;">
            <a href="" style="text-decoration:none; color:#79ed47;">FORUM</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">DISKUSI</a> 
            <hr>
        </h2>
    </div>
    <div class="col-12">                        
        <a href="{{ route('forum.show') }}" class="btn btn-sm btn-light me-4">Kembali</a>            
        <form class="mt-4" method="post" action="{{ route('forum.store') }}">
            @csrf
            <div class="form-group row mb-3">
                <label class="col-sm-2 col-form-label">Judul Forum</label>
                <div class="col-sm-5">
                    <input type="text" name="judul_forum" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-2 col-form-label">Isi Forum</label>
                <div class="col-sm-10">
                    <textarea name="isi_forum" class="form-control" cols="20" rows="5" style="resize:none;"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden> 
                    <button type="submit" class="btn btn-success">Post</button>
                </div>            
            </div>
        </form>            
    </div>
@endsection