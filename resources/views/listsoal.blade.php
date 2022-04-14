@extends('layouts.main')
@section('container')
<div class="col-md-12 bg-light text-right">
	<button type="button" class="btn btn-outline-primary" style="">+ Create New Assessment</button>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Assessment</th>
            <th>Soal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Assessment Tani 1</td>
            <td>Apa Pengaruh Hama Pada Tanaman ?</td>
            <td>
            	<button type="button" class="btn btn-outline-warning" style="margin-right: 3px">EDIT</button>
            	<button type="button" class="btn btn-outline-danger">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Assessment Tani 2</td>
            <td>Bagaimana cara bertani tergantung musim ?</td>
            <td>
            	<button type="button" class="btn btn-outline-warning" style="margin-right: 3px">EDIT</button>
            	<button type="button" class="btn btn-outline-danger">DELETE</button>
            </td>

        </tr>            
    </tbody>
</table>
@endsection