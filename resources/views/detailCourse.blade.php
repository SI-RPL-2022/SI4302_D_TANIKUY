@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-2 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">My</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Course</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">   
  @include('layouts.sidebarSiswa') 
  <div class="col-md-9">
    <div class="h-100 p-3 bg-light border rounded-3">
      <p class="mt-1 mb-3 fs-3 text-center">{{ $mod->nama_course }}</p>
      <div align="justify" style="font-size:14px;">{!! $mod->isi_course !!}</div>
      <div class="d-flex justify-content-center">        
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" class="embed-responsive-item" src="{{ $mod->link_video }}" frameborder="0" allowfullscreen></iframe>
        </div>        
      </div>      
    </div>
  </div>
</div>  
<div class="col-12 mt-5">  
  <div class="row">
    <div class="col-9">
      <div class="fs-4 mb-1">REVIEW KELAS</div>
    </div>    
    <div class="col-3">   
      <div class=" text-end">
        <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#tambahReview">
          Tambah Review
        </button>
        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showAllReview">
          Show All Review
        </button>
      </div>         
      <div class="modal fade" id="tambahReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Review</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ url('siswa/tambahReview') }}" method="post">
                @csrf
                <div class="form-group">       
                  <label>Isi Review</label>           
                  <textarea name="isi_review" class="form-control form-control-sm" rows="2" style="resize:none;"></textarea>                  
                  <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                  <input type="text" name="id_course" value="{{ $mod->id_course }}" hidden>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-sm btn-success">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>   
      <div class="modal fade" id="showAllReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Show All Review</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                 
              <div class="table responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Nama Siswa</td>
                      <td>Isi Review</td>
                      <td>Aksi</td>
                    </tr>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($show_all_review as $show_all_reviews)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $show_all_reviews->name }} </td>
                        <td>{{ $show_all_reviews->isi_review }} </td>
                        <td>
                          @if($show_all_reviews->id == Auth::user()->id)
                          <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editReview2_{{ $show_all_reviews->id_review }}">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <div class="modal fade" id="editReview2_{{ $show_all_reviews->id_review }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Review</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ url('siswa/editReview/'.$show_all_reviews->id_review) }}" method="post">
                                    @csrf
                                    <div class="form-group">                               
                                      <textarea name="isi_review" class="form-control form-control-sm" rows="2" style="resize:none;">{{ $show_all_reviews->isi_review }}</textarea>                  
                                      <input type="text" name="id_user" value="{{ $show_all_reviews->id }}" hidden>
                                      <input type="text" name="id_course" value="{{ $show_all_reviews->id_course }}" hidden>
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
                          <a href="{{ url('siswa/hapusReview/'.$show_all_reviews->id_review) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </thead>
                </table>
              </div>              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>                            
            </div>
          </div>
        </div>
      </div>
    </div>
    @foreach($show_review as $show_reviews)
    <div class="col-4 mb-2">
      <div class="card border rounded-3" style="background-color:#915f4e; height:185px; max-height:185px;" >
        <div class="card-body">
          <div class="card-text">
            <img src="http://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" class="img-fluid rounded-circle" width="13%">
            <small class="ms-1" style="font-size:18px; color:white;">{{ $show_reviews->name }}</small>
          </div>              
          <p class="card-text mt-3 mb-3" style="font-size:14px; color:white;" align="justify">{{ $show_reviews->isi_review }}</p>                   
          @if($show_reviews->id == Auth::user()->id)
          <div class="card-text text-end position-absolute bottom-0 end-0" style="font-size:11px; color:white; margin-bottom:10px; margin-right:15px;">
            <button type="button" style="text-decoration:none; background:none; border:none; color:white;" data-bs-toggle="modal" data-bs-target="#editReview_{{ $show_reviews->id_review }}">
            <i class="fas fa-pen"></i> Edit
            </button>
            <div class="modal fade" id="editReview_{{ $show_reviews->id_review }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ url('siswa/editReview/'.$show_reviews->id_review) }}" method="post">
                      @csrf
                      <div class="form-group">                               
                        <textarea name="isi_review" class="form-control form-control-sm" rows="2" style="resize:none;">{{ $show_reviews->isi_review }}</textarea>                  
                        <input type="text" name="id_user" value="{{ $show_reviews->id }}" hidden>
                        <input type="text" name="id_course" value="{{ $show_reviews->id_course }}" hidden>
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
            | <a href="{{ url('siswa/hapusReview/'.$show_reviews->id_review) }}" class="ms-1" style="text-decoration:none; color:white;"><i class="fas fa-backspace"></i> Hapus</a>
          </div>
          @endif
        </div>
      </div>
    </div> 
    @endforeach
  </div>
</div>  
@endsection