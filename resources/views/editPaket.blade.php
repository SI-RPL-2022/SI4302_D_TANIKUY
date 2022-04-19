<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
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
                <div class="sidebar-heading border-bottom" style="background-color: #deaa7b"><img src="image/logotani.png"></div>
                <div style="background-color: #c5a67c" class="list-group list-group-flush" >
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashadmin">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="tambahCourse">Courses</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="tambahPaket">Package</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="listsoal">Assesment</a>
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
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                <a class="btn btn-info" href="tambahPaket">Add Package</a>
                <br>
                <table class="table-bordered table">
                  <tr>
                    <th>Nama Paket</th>
                    <th>List Course</th>
                    <th>Harga Paket</th>
                    <th colspan="2">Action</th>
                  </tr>
                  @foreach ($datap as $key=>$val)
                    <tr>
                        <td>{{ $val->nama_paket}}</td>
                        <td>{{ $val->nama_course}}</td>
                        <td>{{ $val->harga_paket}}</td>
                        <td><a class="btn btn-info" href="{{ url('editPaket/'.$val->id_paket) }}">Update</a></td>
                        <td><a href="{{ url('deletePaket/'.$val->id_paket) }}" class="btn btn-danger">Delete</a>
                            
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
    <body>
</html>
