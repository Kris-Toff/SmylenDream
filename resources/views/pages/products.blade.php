@extends('master/master-public')

@section('title')
    Products
@endsection

@section('meta')
	<meta name="description" content="Smylen Dream products inlcude Extra Virgin Coconut Oil, Handicrafts made with Coconuts, Native Bags made with Coconuts, Soap made with Coconut Oil and Nata de Coco. Visit us for more information.">
	<meta name="keywords" content="SmylenDream, Smylen Dream, Virgin Coconut Oil,Extra Virgin Coconut Oil, VCO, Coconut Oil, Siquijor, Island, Native Bags, Handicrafts">
@endsection

@section('content')

<!-- Products -->
<div class="container-fluid custom-margin-top">
    <div class="row text-center">
        <div class="col-md-12 align-self-center">
            <h3 class="playfair-font font-weight-bold text-success">Products</h3>
        </div>
    </div>
</div>

    <!-- Products -->
<div class="container custom-margin-top">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                <!-- custom-nav-pills-active text-success -->
                <a class="nav-pills-size custom-nav-pills custom-nav-pills-inactive bg-light" href="/products/native bags/category">
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

<div class="container custom-margin-top">
    <div class="row">

        @foreach ($products as $product)
            <div class="col-md-3 col-sm-6 mt-4">
				<a class="social-link" href="/{{ $product->id }}/view">
					<div class="card shadow">
					    <img class="card-img-top img-fluid" src="{{route('resizer', ['photo' => $product->image, 'width' => 253, 'height' => 253] )}}" alt="{{ $product->name }}">
						<div class="card-body text-center text-success">
						<h5 class="card-title">{{ $product->name }}</h5>
						</div>
					</div>
				</a>
			</div>
        @endforeach

    </div>

    @include('/master/components/navigation/pagination')
</div>

@endsection
