@extends('layouts.main')

@section('container')
    
    <div class="col-12">                    
        <a href="{{ route('forum.show') }}" class="btn btn-sm btn-light me-4 mt-3">Kembali</a>                 
        <div class="card mt-4">
            <div class="card-body">     
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title fw-bold mt-2">
                            {{ $forum->judul_forum }}
                        </h4>
                    </div>
                    <div class="col-3 text-end" style="font-size:13px;">
                        <?php             
                            $waktu = date('d F Y, H:i:s', strtotime( $forum->created_at )); 
                        ?>
                        {{ $waktu }}                            
                    </div>
                </div>                                                                           
                <p class="card-text fw-light" align="justify">{{ $forum->isi_forum }}</p>                
                <p class="text-start text-muted" style="font-size:13px;">{{ $count_reply }} Comment &nbsp.&nbsp {{ $count_like }} Like</p>                 
                <div class="row g-0">
                    <div class="col-1">
                        <form action="{{ url('forum/show-reply/tambah-like') }}" method="post">
                            @csrf
                            <input type="text" name="id_forum" value="{{ $forum->id_forum }}" hidden>
                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                            <button type="submit" class="btn btn-sm btn-light" style="background:none; border:none; font-size:13px;"><i class="far fa-thumbs-up"></i> Like</button> 
                        </form> 
                    </div>                    
                    <div class="col-1">
                        @if($check_like != NULL)
                        <a href="{{ url('forum/show-reply/tambah-dislike/'.Auth::user()->id.'/'.$forum->id_forum) }}" class="btn btn-sm btn-light" style="background:none; border:none; font-size:13px;"><i class="far fa-thumbs-up"></i> Dislike</a>                        
                        @endif
                    </div>                    
                    <div class="col-10">
                        <div class="text-end text-muted">                                                                                       
                            <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#replyForum"><i class="fas fa-comments"></i>
                            Comment
                            </button>                            
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
                                            <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-sm btn-success">Post</button>
                                            </form>
                                        </div>
                                    </div>
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
                    <div class="row">
                        <div class="col-9">
                            <div class="card-text mb-2">            
                                <img src="https://elementor.nokriwp.com/wp-content/uploads/2018/09/806962_user_512x512.png" style="max-width:45px; max-height:45px" class="rounded-circle" alt="">                    
                                <small class="ms-2 fs-6">{{ $reply_forums->name }}</small>
                            </div>  
                        </div>
                        <div class="col-3 text-end" style="font-size:13px;">
                            <?php             
                                $waktu = date('d F Y, H:i:s', strtotime( $reply_forums->created_at )); 
                            ?>
                            {{ $waktu }}                            
                        </div>
                    </div>                                                                                                  
                    <p class="card-text fw-light" align="justify">{{ $reply_forums->isi_reply_forum }}</p>                    
                    <div class="row justify-content-end">                        
                        <div class="col-3">
                            @if($reply_forums->id_user == Auth::user()->id)
                            <div class="text-end">
                                <button type="button" class="me-2" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#editReply_{{ $reply_forums->id_reply_forum }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button> |
                                <a href="{{ url('forum/hapus-reply/'.$reply_forums->id_reply_forum) }}" class="ms-2" style="color:black; text-decoration:none;"><i class="fas fa-trash"></i></a>
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
                            @else
                            <div class="text-end">
                                <button type="button" class="text-muted me-2" style="background:none; border:none;" data-bs-toggle="modal" type="button" disabled>
                                    <i class="fas fa-pencil-alt"></i>
                                </button> |
                                <a href="#" class="ms-2 text-muted" style="pointer-events: none; cursor: default;"><i class="fas fa-trash"></i></a>
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
            </div>  
        </div>
        @endforeach
    </div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection