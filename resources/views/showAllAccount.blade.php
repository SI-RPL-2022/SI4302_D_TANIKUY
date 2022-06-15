@extends('layouts.admin')
@section('container')
<div class="table-responsive mt-2">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>                
                <td>Nama Pengguna</td>
                <td>Alamat Email</td>                                
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($mod as $mods)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mods->name }}</td>
                <td>{{ $mods->email }}</td>
                <td>
                    <a href="{{ url('admin/user-account/delete/'.$mods->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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