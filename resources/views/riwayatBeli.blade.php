@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-4 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">Riwayat</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Transaksi</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">
  @include('layouts.sidebarSiswa')
  <div class="col-md-9">
    <div class="h-100 p-3 bg-light border rounded-3">
      <a href="{{ route('siswa.riwayat.transaction.course') }}" class="btn btn-sm btn-outline-success">Course</a>
      <a href="{{ route('siswa.riwayat.transaction.paket') }}" class="btn btn-sm btn-outline-success">Paket</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Course</th>
            <th scope="col">Tanggal Beli</th>
            <th scope="col">Perkiraan Waktu</th>
            <th scope="col">Harga</th>
            <th scope="col">Status Pembayaran</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
          @foreach($data as $datas)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $datas->nama_course }}</td>
            <td>{{ $datas->created_at }}</td>
            <td>{{ $datas->perkiraan_waktu }}</td>
            <td>{{ $datas->harga_course }}</td>
            <td>
              @if($datas->status_pembayaran == "Belum Lunas")
                <span class="badge bg-danger">{{ $datas->status_pembayaran }}</span>
              @elseif($datas->status_pembayaran == "Sedang Diproses")
                <span class="badge bg-warning">{{ $datas->status_pembayaran }}</span>
              @elseif($datas->status_pembayaran == "Lunas")
              <span class="badge bg-success">{{ $datas->status_pembayaran }}</span>
              @endif
            </td>
            <td>            
              <button type="button" class="btn btn-sm btn-info btn-square mb-1" data-bs-toggle="modal" data-bs-target="#tatacarabayar">
                <i class="fas fa-info"></i>
              </button>              
              <div class="modal fade" id="tatacarabayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tata Cara Bayar</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-title fw-bold">Cara Transfer Bank Lewat ATM</div>
                      <div class="card-text">
                        1. Datang ke ATM BCA/BNI/Mandiri/lainnya yang terdekat.<br>
                        2. Masukkan kartu ATM ke mesin.<br>
                        3. Isi PIN ATM.<br>
                        4. Pilih menu transfer.<br>
                        5. Jika menggunakan kartu ATM BCA,pilih antar rekening dan masukkan nomor rekening tujuan <b>9302829199</b><br>
                        6. Namun jika menggunakan kartu ATM bank lain, pilih antar bank dan masukkan nomor berikut <b>(014)+9302829199</b><br>
                        7. Masukkan nominal sesuai dengan jumlah tagihan pembayaran. <br>
                        8. Klik Ya saat Konfirmasi.<br>
                        9. Selesai
                      </div>
                      <hr>
                      <div class="card-title fw-bold">Cara Transfer Bank Lewat Mobile Banking</div>
                      <div class="card-text">
                        1. Buka aplikasi mobile banking<br>
                        2. Masukkan kode akses aplikasi atau bisa menggunakan sensor fingerprint<br>
                        3. Pilih menu transfer.<br>
                        4. Jika menggunakan BCA mobile, pilih antar rekening dan daftarkan nomor rekening tujuan <b>9302829199</b><br>                        
                        6. Namun jika menggunakan mobile banking dari bank lain, pilih antar bank dan masukkan nomor berikut <b>(014)+9302829199</b><br>
                        7. Kembali ke menu transfer<br>
                        8. Klik antar rekening jika mengggunakan BCA Mobile dan klik antar bank jika menggunakan mobile banking lainnya<br>
                        9. Masukkan nominal sesuai dengan jumlah tagihan pembayaran.<br>
                        10. Klik send dan masukkan pin mobile banking nya. <br>
                        11. Tunggu proses selesai hingga muncul notifikasi berhasil.
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>                      
                    </div>
                  </div>
                </div>
              </div>  
              @if($datas->bukti_transfer == "Tidak Ada" || $datas->status_pembayaran == "Belum Lunas")            
              <button type="button" class="btn btn-sm btn-warning btn-square mb-1" data-bs-toggle="modal" data-bs-target="#buktitransfer_{{ $datas->id_transaksi_course }}">
                <i class="fas fa-upload"></i>
              </button>              
              <div class="modal fade" id="buktitransfer_{{ $datas->id_transaksi_course }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ url('siswa/confirm_transaction_course/'.$datas->id_transaksi_course) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control form-control-sm" name="bukti_transfer">                                               
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div> 
              @else
              <button type="button" class="btn btn-sm btn-dark btn-square mb-1" data-bs-toggle="modal" data-bs-target="#hasilbuktitransfer_{{ $datas->id_transaksi_course }}">
                <i class="fas fa-eye"></i>
              </button>              
              <div class="modal fade" id="hasilbuktitransfer_{{ $datas->id_transaksi_course }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <img src="{{ asset('image/bukti-transfer/'.$datas->bukti_transfer) }}" class="img-fluid rounded" alt="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>                                         
                    </div>
                  </div>
                </div>
              </div>
              @endif            
            </td>            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection