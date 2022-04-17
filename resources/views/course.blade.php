@extends('layouts.main')
@section('container')

<div class="container" style="width: 100%; margin-top:2px;">
    <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-2">KELAS SISTEM LAHAN</span>
      </a>
    </header>

    <div class="row align-items-md-stretch">
      <div class="col-md-3">
      <div class="h-100 p-3 text-black rounded-3" style="background: #579924">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul> 
        </div>
      </div>
      <div class="col-md-9">
        <div class="h-100 p-3 bg-light border rounded-3">
          <p class="mt-1 mb-3 fs-4">PENDAHULUAN</p>
          <div class="d-flex justify-content-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/YxYvJhEqC98" title="YouTube video" allowfullscreen></iframe>
          </div>
          <div class="mt-3 d-grid gap-1 d-md-flex justify-content-md-center">
              <button class="btn btn-primary me-md-2" type="button">Previous</button>
              <button class="btn btn-primary" type="button">Next</button>
          </div>
        </div>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</div>

@endsection