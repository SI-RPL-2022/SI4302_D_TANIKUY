<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFFFF; border-bottom:2px solid green;">
	<div class="container-fluid">
		<a class="navbar-brand mb-1	" href="#">
			<img src="{{ asset('image/logo.png') }}" alt="" width="120" class="d-inline-block align-text-top">	
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarScroll">
			<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Paket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Course</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('forum.show') }}">Forum</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Blog</a>
				</li>																
			</ul>
			<div class="d-flex">
				@guest
				@else
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:rgb(120,120,120);">
						{{ Auth::user()->name }}
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
						<li>
							<a class="dropdown-item" href="#">Dashboard</a>
						</li>					
						<li><hr class="dropdown-divider"></li>
						<li>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>							
						</li>
					</ul>
				</li>
				@endguest
			</div>		
		</div>
	</div>
</nav> 