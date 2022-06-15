@extends('layouts.main')
@section('container')
<div class="col-5 col-lg-3 mt-3">
  <h2 class="fw-bold" style="font-size:35px;">
    <a href="" style="text-decoration:none; color:#79ed47;">My</a> <a href="" style="text-decoration:none; color:rgb(120,120,120);">Dashboard</a> 
    <hr>
  </h2>
</div>
<div class="row align-items-md-stretch">
    @include('layouts.sidebarSiswa')
    <div class="col-md-9">
        <div class="col-12">    
            <div class="row">
                <div class="col-7">
                    <div class="col-12"> 
                        <div class="h-100 p-3 border rounded-3" style="background-color:#915f4e;">      
                            <div class="text-start">
                                <div class="fs-5 mb-2" style="color:white;">Progress Course</div>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="color:black; width:{{$persentase_course}}%;" aria-valuenow="{{$persentase_course}}" aria-valuemin="0" aria-valuemax="100">{{ $persentase_course }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-12 mt-3">
                        <div class="h-100 p-3 bg-light border rounded-3">      
                            <div class="fs-5 mb-2">Riwayat Akhir Akses Course</div>
                            <div class="table-responsive">
                                <table class="table table-hover" style="font-size:15px;"> 
                                    <thead style="border-bottom:2px solid #579924;">
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Course</td>
                                            <td>Waktu Terakhir Akses</td>
                                        </tr>
                                    </thead>
                                    <tbody style="border-bottom:1px solid #579924;">
                                        <?php $no = 1 ?>
                                        @foreach($riwayat_course as $riwayat_courses)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $riwayat_courses->nama_course }}</td>
                                            <td>{{ $riwayat_courses->akses_terakhir }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                
                </div> 
                <div class="col-5">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <div class="p-3 border rounded-3">      
                            <div class="fs-5 mb-2">Course Yang Belum Selesai</div> 
                            @foreach($course_belum_selesai as $item)  
                            <div class="card mb-2" style="max-width: 540px; background-color:#579924;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="card-img-top h-100" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h6 class="card-title fw-light" style="color:white">{{ $item->nama_course }}</h6>                                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            @endforeach                                                                           
                        </div>
                    </div>                    
                </div>        
            </div>                           
        </div>                  
    </div>
</div>
@endsection 