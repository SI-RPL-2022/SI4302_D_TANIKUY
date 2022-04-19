@extends('layouts.admin')
@section('container')            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Assessment</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Assessment</th>                        
                        <th>Status</th>   
                        <th>Nilai</th> 
                        <th>Action</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                   @foreach($assessment as $key)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $key->nama_ass }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ $key->created_at }}</td>
                        <td>{{ $key->status }}</td>
                        <td>{{ $key->nilai }}</td>
                        <td>                            
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#lihatJawaban_{{ $key->id_jawaban }}">
                            Lihat Jawaban
                            </button>
                            
                            <div class="modal fade" id="lihatJawaban_{{ $key->id_jawaban }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Jawaban</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $key->deskripsi_jawaban }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#nilai_{{ $key->id_jawaban }}">
                            Nilai
                            </button>
                            
                            <div class="modal fade" id="nilai_{{ $key->id_jawaban }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nilai Assessment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('admin/assessments/store/'.$key->id_jawaban) }}" method="post">
                                            @csrf
                                            <label for="">Nilai</label>
                                            <input type="number" min="0" max="100" class="form-control form-control-sm" name="nilai">                                        
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>                                            
                                        </form>
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>        
@endsection
    </body>
</html>
