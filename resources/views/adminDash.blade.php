@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="mt-6">Dashboard Admin</h1>
        <div class="row row-cols-1 row-cols-md-3 g-3 p-5">
            <div class="card" style="width: 13rem;">
                <div class="card-body" style="background-color: #deaa7b">
                    <img src="{{ asset('image/dashboardadmin-1.png') }}" style="float: left">
                    <p class="card-text" style="text-align: right">Courses</p>
                    <a href="{{ url('tambahCourse') }}" class="card-footer btn" style="float: right;"><img src="image/add.png" width="15%">Add Courses</a>
                </div>
            </div>
            <div class="card" style="width: 13rem;">
                <div class="card-body" style="background-color: #deaa7b">
                    <img src="{{ asset('image/dashboardadmin-1.png') }}" style="float: left">
                    <p class="card-text" style="text-align: right">Package</p>
                    <a href="{{ url('admin/tambahPaket') }}" class="card-footer btn" style="float: right;"><img src="image/add.png" width="15%">Add Package</a>
                </div>
            </div>
        </div>
    </div>
@endsection
    </body>
</html>
