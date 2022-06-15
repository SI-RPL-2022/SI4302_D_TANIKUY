@extends('layouts.admin')
@section('container')
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>                                
                <td>Alamat Email</td>      
                <td>Isi Keluhan</td>                                          
                <td>Tanggal Kirim</td> 
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->email }}</td>
                <td>{{ $mods->isi_keluhan }}</td>                                
                <td>{{ $mods->created_at }}</td>                                
                <td>
                    @if($mods->status == 'Belum Diproses')
                        <span class="badge bg-danger">{{ $mods->status }}</span>                        
                    @elseif($mods->status == 'Sudah Diproses')
                        <span class="badge bg-success">{{ $mods->status }}</span>                        
                    @endif
                </td>                                
                <td>
                    @if($mods->status == 'Belum Diproses')
                    <form action="{{ url('admin/data-keluhan/balas-mail/'.$mods->id_keluhan) }}" method="post" class="mb-1">
                        @csrf
                        <input type="text" name="email" value="{{ $mods->email }}" hidden>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-envelope-open"></i></button>
                    </form>              
                    @endif
                    <a href="{{ url('admin/data-keluhan/hapus/'.$mods->id_keluhan) }}" class="btn btn-sm btn-danger btn-square"><i class="fas fa-trash"></i></a>
                </td>                
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