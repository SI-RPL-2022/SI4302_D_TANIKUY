@extends('layouts.admin')
@section('container')
<button type="button" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#tambahAksesCourse">
Tambah Akses Course
</button>
<div class="modal fade" id="tambahAksesCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akses Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/akses-course/tambah') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <select name="id_user" id="" class="form-control form-control-sm">
                            @foreach($nama_user as $users)
                            <option value="{{ $users->id }}">{{ $users->name }} ({{ $users->id }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Course</label>
                        <select name="id_course" id="" class="form-control form-control-sm">
                            @foreach($nama_course as $courses)
                            <option value="{{ $courses->id_course }}">{{ $courses->nama_course }} ({{ $courses->id_course }})</option>
                            @endforeach
                        </select>
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
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>                
                <td>Nama Pengguna</td>
                <td>Nama Course</td>                                
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->name }} <b class="text-muted fw-normal">({{ $mods->id_user }})</td>
                <td>{{ $mods->nama_course }} <b class="text-muted fw-normal">({{ $mods->id_course }})</b></td>                                
                <td><a href="{{ url('admin/akses-course/hapus/'.$mods->id_akses_course) }}" class="btn btn-sm btn-danger btn-square"><i class="fas fa-trash"></i></a></td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection