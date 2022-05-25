@extends('layouts.admin')
@section('container')

                
                <a class="btn btn-info" href="{{ url('tambahCourse') }}">Add Course</a>
                <br>
                <table class="table-bordered table">
                  <tr>
                    <th>Nama Course</th>
                    <th>Harga Course</th>
                    <th>Perkiraan Waktu Belajar Course</th>                    
                    <th colspan="2">Action</th>
                  </tr>
                  @foreach ($datas as $key=>$value)
                      <tr>
                          <td>{{ $value->nama_course}}</td>
                          <td>{{ $value->harga_course}}</td>
                          <td>{{ $value->perkiraan_waktu}} Jam</td>                          
                          <td><a class="btn btn-info" href="{{ url('course/'.$value->id_course.'/edit') }}">Update</a></td>
                          <td>
                              <form action="{{ url('course/'.$value->id_course) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                </table>
            
@endsection