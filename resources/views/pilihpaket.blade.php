@extends('layouts.main')
@section('container')
<div class="container d-flex justify-content-center" style="margin-top:10%;">
        <ul class="list-group" style="width:40%; border-radius: 30px 30px; border: 2px solid #579924;">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Annual
                <button type="button" class="btn btn-outline-primary">Select</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Monthly
                <button type="button" class="btn btn-outline-primary">Select</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Yearly
                <button type="button" class="btn btn-outline-primary">Select</button>
            </li>
        </ul>
</div>

@endsection