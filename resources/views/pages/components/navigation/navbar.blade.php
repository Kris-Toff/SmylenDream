<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<a class="navbar-brand" href="/">
		<img style="width:170px;" src="{{ asset('images/smylen-logo.png') }}" alt="logo">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto w-100 justify-content-end">
			<li class="nav-item">
				<a class="nav-link {{ Request::is('/') ? 'text-success' : '' }}" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('products') ? 'text-success' : '' }}" href="{{ url('products') }}">Products</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('blog') ? 'text-success' : '' }}" href="{{ url('blog') }}">Blog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('#contactus') ? 'text-success' : '' }}" href="{{ url('/#contactus') }}">Contact Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('about-us') ? 'text-success' : '' }}" href="{{ url('about-us') }}">About Us</a>
			</li>
		</ul>
		<div class="col-md-12 col-lg-3">
			<form method="GET" action="/search">
				<div class="input-group d-flex align-items-center">
					<input name="search" type="text" class="form-control" placeholder="Search" required>
					<div class="input-group-append">
					<button class="btn smylen-btn" type="submit" id="button-addon2">
						<i class="fas fa-search"></i>
					</button>
					</div>
				</div>

			</form>
		</div>
</div>
</nav>
