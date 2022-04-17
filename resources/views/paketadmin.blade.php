@extends('layouts.main')
@section('container')
<div class="container" style="width: 80%; margin-top:2px;">
    <div class="container py-3">
        <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-2">DATA PAKET</span>
        </a>
        </header>
    </div>
    <div class="col-sm-10">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>  
                    <th scope="col">Nama paket</th>
                    <th scope="col">Harga Paket</th>
                    <th scope="col">List Course</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">123</th>
                    <td>1a2b</td>
                    <td>Tani1</td>
                    <td>stat</td>
                    <td>
                        <button type="button" class="btn btn-primary">Left</button>
                        <button type="button" class="btn btn-primary">Right</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">234</th>
                    <td>3c4d</td>
                    <td>Tani2</td>
                    <td>stat</td>
                    <td>
                        <button type="button" class="btn btn-primary">Left</button>
                        <button type="button" class="btn btn-primary">Right</button>
                    </td>
                    </tr>
                <tr>
                    <th scope="row">345</th>
                    <td>5e6f</td>
                    <td>Tani3</td>
                    <td>stat</td>
                    <td>
                        <button type="button" class="btn btn-primary">Left</button>
                        <button type="button" class="btn btn-primary">Right</button>
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection