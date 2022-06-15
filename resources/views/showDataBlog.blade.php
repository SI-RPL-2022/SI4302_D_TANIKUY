@extends('layouts.admin')
@section('container')
<a href="{{ url('admin/blog/tambah') }}" class="btn btn-sm btn-success mt-2">Tambah Blog</a>
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>                
                <td>Nama Blog</td>
                <td>Kategori</td>                                
                <td>Nama Pembuat</td> 
                <td>Tanggal Dibuat</td>    
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->judul_blog }}</td>
                <td>{{ $mods->kategori }}</td>
                <td><b class="text-muted" style="font-size:10px;">(ADMIN)</b> {{ $mods->name }}</td>
                <td>{{ $mods->created_at }}</td>
                <td>
                    <a href="{{ url('admin/blog/edit/'.$mods->id_blog) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{ url('admin/blog/delete/'.$mods->id_blog) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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