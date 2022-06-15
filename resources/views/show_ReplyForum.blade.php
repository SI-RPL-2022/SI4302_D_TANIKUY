@extends('layouts.main')

@section('container')
    
    <div class="col-12">                    
        <a href="{{ route('forum.show') }}" class="btn btn-sm btn-light me-4">Kembali</a>                 
        <div class="card mt-4">
            <div class="card-body">                                                                
                <h4 class="card-title fw-bold mt-2">
                    {{ $forum->judul_forum }}
                </h4>
                <p class="card-text fw-light" align="justify">{{ $forum->isi_forum }}</p>                
                <p class="text-start" style="font-size:13px;">{{ $count_reply }} Comment</p>                 
                
                <div class="text-end text-muted">                                                           
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#replyForum"><i class="fas fa-comments"></i>
                    Comment
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="replyForum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Comment Forum</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('reply.forum.store') }}" method="post">
                                        @csrf
                                        <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                                        <input type="text" name="id_forum" value="{{ $forum->id_forum }}" hidden>
                                        <textarea name="isi_reply_forum" class="form-control" style="resize:none;" cols="2" rows="3"></textarea>                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-choco">Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>                
    </div>
    <div class="row">
        @foreach($reply_forum as $reply_forums)
        <div class="col-1"></div>
        <div class="col-11">
            <div class="card mt-4">
                <div class="card-body">    
                    <div class="card-text mb-2">            
                        <img src="https://elementor.nokriwp.com/wp-content/uploads/2018/09/806962_user_512x512.png" style="max-width:45px; max-height:45px" class="rounded-circle" alt="">                    
                        <small class="ms-2 fs-6">{{ $reply_forums->name }}</small>
                    </div>                                                                                
                    <p class="card-text fw-light" align="justify">{{ $reply_forums->isi_reply_forum }}</p>                    
                    @if($reply_forums->id_user == Auth::user()->id)
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#editReply_{{ $reply_forums->id_reply_forum }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </button>                        
                        <a href="{{ url('forum/hapus-reply/'.$reply_forums->id_reply_forum) }}" class="btn btn-sm btn-secondary"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                    <div class="modal fade" id="editReply_{{ $reply_forums->id_reply_forum }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Reply Forum</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('forum/edit-reply/'.$reply_forums->id_reply_forum) }}" method="post">
                                    @csrf
                                    <div class="form-group">                               
                                        <textarea name="isi_reply_forum" class="form-control form-control-sm" rows="2" style="resize:none;">{{ $reply_forums->isi_reply_forum }}</textarea>                                                                                                  
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
                    @endif
                </div>
            </div>  
        </div>
        @endforeach
    </div>
@endsection