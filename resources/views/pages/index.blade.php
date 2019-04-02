@extends('master/master-public')

@section('meta')
	<meta name="description" content="We sell Extra Virgin Coconut Oil, Native Bags, Handicrafts and Health Products. Visit us for more information.">
	<meta name="keywords" content="SmylenDream, Smylen Dream, Virgin Coconut Oil,Extra Virgin Coconut Oil, VCO, Coconut Oil, Siquijor, Island, Native Bags, Handicrafts">
@endsection

@section('content')

<div class="container-fluid custom-margin-top">
    <div class="row text-center">
        <div class="col-md-6 align-self-center">
            <h3 class="playfair-font font-weight-bold text-success">Health Benefits of Virgin Coconut Oil</h3>
            <h5 class="playfair-font">Although it is a 90% saturated fat, organic coconut oil contains medium-chain fatty acids (MCFAs) that can improve your health in many ways.</h5>
    
            <p>Organic coconut oil is highly nutritious and contains a superior disease fighting fatty acid called lauric acid. It is also rich in fiber, vitamins, and minerals.</p>
            <a href="/benefits" class="btn btn-outline-success my-2 my-sm-0">Read more</a>
        </div>
        <div class="col-md-6">
		<img class="img-fluid" src="{{ asset('images/health-benefits.png') }}">
        </div>
    </div>
</div>
    
<!-- Products Hero -->
<div class="jumbotron jumbotron-fluid parallax-menu text-center custom-margin-top" style="background-image: url( {{ asset('images/products_banner.JPG') }});">
	<div class="container jumbotron-content-margin">
		<hr>
		<img class="" style="width:250px;" src="{{ asset('images/symlendream-logo.png') }}">
		<hr>
		<h1 class="playfair-font font-weight-bold text-success">PRODUCTS</h1>
	</div>
</div>

<div class="container custom-margin-top">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<ul class="nav nav-pills nav-fill">
			  <li class="nav-item">
				<a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/products/native bags/category">
					<p class="nav-pills-v-center"><i class="fas fa-shopping-bag fa-2x"></i></p>
					<p>Native Bags</p>
				</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/products/handicrafts/category">
			    	<p class="nav-pills-v-center"><i class="fas fa-gavel fa-2x"></i></p>
			    	<p>Handicrafts</p>
			    </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/products/food/category">
			    	<p class="nav-pills-v-center"><i class="fas fa-utensils fa-2x"></i></p>
			    	<p>Food</p>
			    </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/products/health/category">
			    	<p class="nav-pills-v-center"><i class="fas fa-spa fa-2x"></i></p>
			    	<p>Health</p>
			    </a>
			  </li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		@foreach ($products as $product)
			<div class="col-md-3 col-sm-6 mt-4">
				<a class="social-link" href="/{{ $product->id }}/view">
					<div class="card">
					<img class="card-img-top img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
						<div class="card-body text-center text-success">
						<h5 class="card-title">{{ $product->name }}</h5>
						</div>
					</div>
				</a>
			</div>
		@endforeach

	</div>
</div>

<!-- Contact Us Hero -->
<div id="contactus" class="jumbotron jumbotron-fluid parallax-menu custom-margin-top" style="background-image: url({{ asset('images/business-connection-contact-955081.jpg') }});">
	<div class="container jumbotron-contact-margin text-center">
		<h1 class="playfair-font font-weight-bold">CONTACT US</h1>
		<hr>
		<h5 class="playfair-font contact-font-size"><i class="far fa-user-circle"></i> Merlie Cento Fisher</h5>
		<h5 class="playfair-font contact-font-size"><i class="fas fa-phone"></i> +63 906 337 5211</h5>	
		<h5 class="playfair-font contact-font-size"><i class="far fa-envelope"></i> merliefisher@yahoo.com</h5>
		<hr>
	</div>
</div>

<!-- About Us -->
<div class="container-fluid my-5">
        <div class="row text-center">
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/O0hMwJ6LRdw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6 align-self-center">
            <h3 class="playfair-font font-weight-bold text-success">About Us</h3>
            <h5 class="playfair-font">Siquijor “Dream Team”  are so happy to have a dedicated team consisting of relatives and friends and we’re as happy to have them as they are to work for us.</h5>
    
            <p>Some of the workers have been with us since June 2011 when we started our house in Lumangcapan. Mylen’s father, Andres Cento has been a building contractor his whole life and even now at almost 80 years old, he doesn’t want to stop working.</p>
            <a href="/about-us" class="btn btn-outline-success my-2 my-sm-0">Read more</a>
        </div>
    </div>
</div>
    
@endsection