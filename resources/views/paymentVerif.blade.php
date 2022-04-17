@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-3">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">PAYMENT VERIFICATION</span>
      </a>
    </header>
    </div>

    <div class="h-400 p-3 bg-light border rounded-3">
      <div class="input-group mb-3 w-50 d-md-flex justify-content-md-center">
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="mt-3 d-grid gap-1 d-md-flex justify-content-md-center">
        <button class="btn btn-primary" for="inputGroupFile02" type="submit">Upload</button>
      </div>
    </div>
    
</div>

@endsection