@extends('layouts.main')
@section('container')

<div class="container" style="width: 80%; margin-top:2px;">
    <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">PAYMENT VERIFICATION</span>
      </a>
    </header>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID User</th>
      <th scope="col">ID Pembayaran</th>
      <th scope="col">ID Course</th>
      <th scope="col">Status</th>
      <th scope="col">Bukti Pembayaran</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">123</th>
      <td>1a2b</td>
      <td>Tani1</td>
      <td>stat</td>
      <td>pict</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary">Left</button>
          <button type="button" class="btn btn-primary">Right</button>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">234</th>
      <td>3c4d</td>
      <td>Tani2</td>
      <td>stat</td>
      <td>pict</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary">Left</button>
          <button type="button" class="btn btn-primary">Right</button>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">345</th>
      <td>5e6f</td>
      <td>Tani3</td>
      <td>stat</td>
      <td>pict</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary">Left</button>
          <button type="button" class="btn btn-primary">Right</button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection