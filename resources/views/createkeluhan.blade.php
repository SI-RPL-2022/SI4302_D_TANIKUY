@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-3">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">Keluhan</span>
      </a>
    </header>
    </div>

    <div class="h-400 p-3 bg-light border rounded-3">
        <form action="{{ url('/store') }}" method="POST" class="form" style="size: 5ch">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keluhan</label>
                <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Masukkan keluhan anda">
              </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

</div>
<script>
<?php if (session('success'))
echo <<<DATA
Swal.fire(
  'Terimakasih!',
  'Keluhan Berhasil Dikirim!',
  'success'
)
endif
DATA
?>
</script>
@endsection
