@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-3">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">Riwayat Nilai Assessment</span>
      </a>
    </header>
    
    </div>
    <div class="container" style="width: 100%; margin-top:2px;">
      <div class="container py-4">
        <div class="row align-items-md-stretch">
        @include('layouts.sidebarSiswa')

          <div class="col-md-9">
            <div class="h-100 p-5 bg-light border rounded-3">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Assessment</th>
                    <th scope="col">Deskripsi Jawaban</th>
                    <th scope="col">Tanggal Assessment</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($assessment as $assessments)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $assessments->nama_ass }}</td>
                    <td>{{ $assessments->deskripsi_jawaban }}</td>
                    <td>{{ $assessments->created_at }}</td>
                    <td><b>{{ $assessments->nilai }}</b> / 100</td>
                    <td>
                      @if($assessments->status == "Menunggu Review")
                        <span class="badge bg-warning">{{ $assessments->status }}</span>
                      @elseif($assessments->status == "Selesai Review")
                        <span class="badge bg-success">{{ $assessments->status }}</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

@endsection