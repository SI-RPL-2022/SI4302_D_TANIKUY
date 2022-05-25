  <div class="col-md-3">
    <div class=" p-4 text-white rounded-3" style="background: #579924; height:295px;">
      <ul class="list-unstyled ps-0">
        <!-- <li class="mb-1 ">
          <a class="btn btn-toggle align-items-center rounded collapsed text-light" href="{{ route('siswa.buy.course') }}" > Course</a>
          <div class="collapse show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="#" class="link-light rounded">Overview</a></li>
              <li><a href="#" class="link-light rounded">Updates</a></li>
              <li><a href="#" class="link-light rounded">Reports</a></li>
            </ul>
          </div>
        </li> -->
        <li class="mb-2">
          <div class="d-grid gap-2">
            <a class="btn btn-toggle align-items-center rounded collapsed text-start" id="sidenav_menu" href="{{ url('siswa/mycourse') }}">My Course</a>
          </div>
        </li>
        <li class="mb-2">
          <div class="d-grid gap-2">
            <a class="btn btn-toggle align-items-center rounded collapsed text-start" id="sidenav_menu" href="{{ url('siswa/tugas') }}">Assesment</a>
          </div>  
        </li>
        <li class="mb-2">
          <div class="d-grid gap-2">
            <a class="btn btn-toggle align-items-center rounded collapsed text-start" id="sidenav_menu" href="{{ url('siswa/tugas/jawaban') }}">Hasil Assessment</a>
          </div>
        </li>
        <li class="mb-2">
          <div class="d-grid gap-2">
            <button class="btn btn-toggle align-items-center rounded collapsed text-start" id="sidenav_menu" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">Langganan</button>
          </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-0">
          <div class="d-grid gap-2">
            <a class="btn btn-toggle align-items-center rounded collapsed text-start" id="sidenav_menu" href="{{ route('siswa.riwayat.transaction.course') }}">Riwayat Transaksi</a>
          </div>
        </li>
      </ul>
    </div>
  </div>