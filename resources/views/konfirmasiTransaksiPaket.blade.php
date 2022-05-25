@extends('layouts.admin')
@section('container')
<a href="{{ url('admin/konfirmasi-transaksi/course') }}" class="btn btn-sm btn-outline-success mt-2">Course</a>
<a href="{{ url('admin/konfirmasi-transaksi/paket') }}" class="btn btn-sm btn-outline-success mt-2">Paket</a>
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Paket</td>
                <td>Nama Pembeli</td>
                <td>Tanggal Transaksi</td>
                <td>Status Pembayaran</td>
                <td>Total Harga</td>
                <td>Bukti Transfer</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->nama_paket }}</td>
                <td>{{ $mods->name }} <b class="text-muted fw-normal">({{ $mods->id_user }})</b></td>
                <td>{{ $mods->created_at }}</td>
                <td>{{ $mods->harga_paket }}</td>
                <td>
                    @if($mods->status_pembayaran == "Lunas")
                    <span class="badge bg-success">{{ $mods->status_pembayaran }}</span>
                    @elseif($mods->status_pembayaran == "Sedang Diproses")
                    <div class="row">
                        <div class="col-1 me-3">
                            <form action="{{ url('admin/konfirmasi-transaksi/paket/terima/'.$mods->id_transaksi_paket) }}" method="post">
                                @csrf
                                <input type="text" name="id_user" value="{{ $mods->id_user }}" hidden>
                                <input type="text" name="id_paket" value="{{ $mods->id_paket }}" hidden>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                            </form>            
                        </div>
                        <div class="col-1 ">
                            <form action="{{ url('admin/konfirmasi-transaksi/paket/tolak/'.$mods->id_transaksi_paket) }}" method="post">
                                @csrf
                                <input type="text" name="id_user" value="{{ $mods->id_user }}" hidden>
                                <input type="text" name="id_paket" value="{{ $mods->id_paket }}" hidden>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                            </form>            
                        </div>
                    </div> 
                    @endif                                   
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-dark btn-square mb-1" data-bs-toggle="modal" data-bs-target="#hasilbuktitransfer_{{ $mods->id_transaksi_paket }}">
                    <i class="fas fa-eye"></i>
                    </button>              
                    <div class="modal fade" id="hasilbuktitransfer_{{ $mods->id_transaksi_paket }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-sm btn-warning btn-square" data-bs-toggle="modal" data-bs-target="#aktivasiCourse{{ $mods->id_transaksi_paket }}">
                    <i class="fas fa-info"></i>
                    </button>              
                    <div class="modal fade" id="aktivasiCourse{{ $mods->id_transaksi_paket }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <p class="card-title fw-bold">Berikut List Paket Yang Harus Diberi Akses:</p>
                                <p class="card-text fw-lighter">{{ $mods->nama_course }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>                                         
                            </div>
                        </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/konfirmasi-transaksi/paket/hapus/'.$mods->id_transaksi_paket) }}" class="btn btn-sm btn-danger btn-square"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection