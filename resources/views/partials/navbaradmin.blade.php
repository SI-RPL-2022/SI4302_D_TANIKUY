<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom" style="background-color: #deaa7b"><img src="{{ asset('image/logo resize-1.png') }}"></div>
                <div style="background-color: #c5a67c" class="list-group list-group-flush" >
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.home') }}">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.editCourse') }}">Courses</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.editPaket') }}">Package</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.liatsoal') }}">Assesment</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.assessment') }}">Review Assesment</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('admin/konfirmasi-transaksi/course') }}">Konfirmasi Transaksi</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('admin/akses-course') }}">Akses Course</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ url('admin/data-keluhan') }}">Data Keluhan</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <img src="{{ asset('image/menu-1.png') }}" width="3%" id="sidebarToggle">
                        <!--<button class="btn btn-primary" id="sidebarToggle"><img src="image/menu.png" width="5%" id="sidebarToggle"></button>-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>                    </div>
                </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>