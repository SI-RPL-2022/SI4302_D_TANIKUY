<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom" style="background-color: #deaa7b"><img src="image/logo resize-1.png"></div>
                <div style="background-color: #c5a67c" class="list-group list-group-flush" >
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Courses</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="tambahPaket">Package</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Assesment</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Blogs</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <img src="image/menu-1.png" width="3%" id="sidebarToggle">
                        <!--<button class="btn btn-primary" id="sidebarToggle"><img src="image/menu.png" width="5%" id="sidebarToggle"></button>-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <!--<li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="image/profile.png"></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content -->
                <br>
                <a class="btn btn-info" href="{{ url('tambahCourse') }}">Add Course</a>
                <br>
                <table class="table-bordered table">
                  <tr>
                    <th>Nama Course</th>
                    <th>Harga Course</th>
                    <th>Perkiraan Waktu Belajar Course</th>
                    <th>Tanggal Buat </th>
                    <th colspan="2">Action</th>
                  </tr>
                  @foreach ($datas as $key=>$value)
                      <tr>
                          <td>{{ $value->nama_course}}</td>
                          <td>{{ $value->harga_course}}</td>
                          <td>{{ $value->perkiraan_waktu}}</td>
                          <td>{{ $value->tgl_dibuat}}</td>
                          <td><a class="btn btn-info" href="{{ url('course/'.$value->id.'/edit') }}">Update</a></td>
                          <td>
                              <form action="{{ url('course/'.$value->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                </table>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>