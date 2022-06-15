@extends('layouts.main')

@section('extend-css')
<link href="{{asset('css/forum.css')}}" rel="stylesheet">   
@endsection

@section('container')
    <div class="col-7 col-lg-3">
        <h2 class="fw-bold" style="font-size:35px;">
            <a href="" style="text-decoration:none; color:#79ed47;">FORUM</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">DISKUSI</a> 
            <hr>
        </h2>
    </div>
    <div class="col-12">                
        <form action="{{ route('forum.search') }}" method="get" style="color: #555; display: flex; border-radius: 5px;">            
            <a href="{{ route('forum.add') }}" class="btn btn-sm btn-light me-4">Add A New Discussion Topic</a>
            <input type="text" name="search" placeholder="Search Forum">
            <button id="submit" type="submit">Search</button>
        </form>
        @foreach($mod as $mods)
        <div class="card mt-4">
            <div class="card-body">                                                
                <div class="card-text">            
                    <img src="https://elementor.nokriwp.com/wp-content/uploads/2018/09/806962_user_512x512.png" style="max-width:45px; max-height:45px" class="rounded-circle" alt="">                    
                    <small class="ms-2 fs-6">{{ $mods->name }}</small>
                </div>
                <h4 class="card-title fw-bold mt-2">
                    {{ $mods->judul_forum }}
                </h4>
                <p class="card-text fw-light mb-1" align="justify">{{ $mods->isi_forum }}</p>
                <div class="row mt-4">                     
                    <div class="col-6">
                        @if($mods->id_user == Auth::user()->id)
                        <div class="text-start text-muted">
                            <button type="button" class="btn btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#editForum_{{ $mods->id_forum }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </button>                        
                            <a href="{{ url('forum/hapus-forum/'.$mods->id_forum) }}" class="btn btn-sm btn-secondary"><i class="fas fa-trash"></i> Hapus</a>
                            <div class="modal fade" id="editForum_{{ $mods->id_forum }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Forum</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('forum/edit-forum/'.$mods->id_forum) }}" method="post">
                                            @csrf
                                            <div class="form-group">                               
                                                <textarea name="isi_forum" class="form-control form-control-sm" rows="2" style="resize:none;">{{ $mods->isi_forum }}</textarea>                                                                                                  
                                            </div>                    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-sm btn-warning">Ubah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        @endif
                    </div>                    
                    <div class="col-6">
                        <div class="text-end text-muted">
                            <a href="{{url('forum/show-reply/'.$mods->id_forum)}}" class="text-muted"><i class="far fa-comments me-2"></i></a>                                                                                    
                        </div>
                    </div>
                </div>                
            </div>
        </div>   
        @endforeach                 
    </div>
@endsection