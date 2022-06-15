@extends('layouts.admin')
@section('container')
<a href="{{ url('admin/konfirmasi-transaksi/course') }}" class="btn btn-sm btn-outline-success mt-2">Course</a>
<a href="{{ url('admin/konfirmasi-transaksi/paket') }}" class="btn btn-sm btn-outline-success mt-2">Paket</a>
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Course</td>
                <td>Nama Pembeli</td>
                <td>Tanggal Transaksi</td>
                <td>Total Harga</td>
                <td>Status Pembayaran</td>
                <td>Bukti Transfer</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->nama_course }}</td>
                <td>{{ $mods->name }} <b class="text-muted fw-normal">({{ $mods->id_user }})</b></td>
                <td>{{ $mods->created_at }}</td>
                <td>{{ $mods->harga_course }}</td>
                <td>
                    @if($mods->status_pembayaran == "Lunas")
                    <span class="badge bg-success">{{ $mods->status_pembayaran }}</span>
                    @elseif($mods->status_pembayaran == "Sedang Diproses")
                    <div class="row">
                        <div class="col-1 me-3">
                            <form action="{{ url('admin/konfirmasi-transaksi/course/terima/'.$mods->id_transaksi_course) }}" method="post">
                                @csrf
                                <input type="text" name="id_user" value="{{ $mods->id_user }}" hidden>
                                <input type="text" name="id_course" value="{{ $mods->id_course }}" hidden>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                            </form>            
                        </div>
                        <div class="col-1 ">
                            <form action="{{ url('admin/konfirmasi-transaksi/course/tolak/'.$mods->id_transaksi_course) }}" method="post">
                                @csrf
                                <input type="text" name="id_user" value="{{ $mods->id_user }}" hidden>
                                <input type="text" name="id_course" value="{{ $mods->id_course }}" hidden>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                            </form>            
                        </div>
                    </div> 
                    @endif                                   
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-dark btn-square mb-1" data-bs-toggle="modal" data-bs-target="#hasilbuktitransfer_{{ $mods->id_transaksi_course }}">
                    <i class="fas fa-eye"></i>
                    </button>              
                    <div class="modal fade" id="hasilbuktitransfer_{{ $mods->id_transaksi_course }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <img src="{{ asset('image/bukti-transfer/'.$mods->bukti_transfer) }}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>                                         
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
                <td>                    
                    <a href="{{ url('admin/konfirmasi-transaksi/course/hapus/'.$mods->id_transaksi_course) }}" class="btn btn-sm btn-danger btn-square"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection