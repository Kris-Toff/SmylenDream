@extends('master/master-public')

@section('title')
    {{ $product->name }} | Smylen Dream
@endsection

@section('meta')
    <meta name="description" content="{{ $product->short_description }}">
	<meta name="keywords" content="{{ $product->category }}, SmylenDream, Smylen Dream, Virgin Coconut Oil,Extra Virgin Coconut Oil, VCO, Coconut Oil, Siquijor, Island, Native Bags, Handicrafts">
    <meta property="og:site_name" content="Smylen Dream">
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description" content="{{ $product->short_description }}" />
    <meta property="og:image" content="{{ asset('images/'.$product->image) }}" />
@endsection

@section('content')
    <!-- Product Details -->
<div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-5">
                <div class="col-md-12">
					<img class="img-item-view img-thumbnail" src="{{route('resizer', ['photo' => $product->image, 'width' => 405, 'height' => 405] )}}" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-6 align-self-start mt-5">
                <div class="col-md-12">
                    <h2 class="playfair-font font-weight-bold text-success">{{ $product->name }}</h2>
                    <h4 class="playfair-font">&#8369; {{ $product->price }}</h4>
                    <h5 class="text-justify">{{ $product->short_description }}</h5>
                    <br>
                    <h5 class="playfair-font">Category: <a href="/products/{{ $product->category }}/category" class="badge badge-success">{{ $product->category }}</a></h5>
                    <div class="fb-share-button"
                        data-href="{{ url()->full() }}"
                        data-layout="button">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="playfair-font font-weight-bold text-success">Additional Information</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12 border">
                    <h5 class="text-justify">{{ $product->additional_information }}</h5>
                </div>
            </div>
                <div class="col-md-6">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td colspan="3">Dimensions</td>
                        </tr>
                        <tr>
                            @for ($i = 0; $i < count($dimensions) ; $i+=2)
                                <td>{{ $dimensions[$i] }}</td>
                            @endfor
                        </tr>
                        <tr>
                            @for ($i = 1; $i < count($dimensions) ; $i+=2)
                                <td>{{ $dimensions[$i] }}</td>
                            @endfor
                        </tr>
                    </table>
                </div>
        </div>
    </div>

    <div class="container custom-margin-top">
        <div class="row custom-margin-bottom">
            <div class="col-md-12 text-center">
                    <h3 class="playfair-font font-weight-bold text-success">Related Products</h3>
            </div>
        </div>

        <div class="row">
                @foreach ($relatedItems as $item)
                    <div class="col-md-3 col-sm-6" style="margin-bottom:50px;">
                        <a class="social-link" href="/{{ $item->id }}/view">
                            <div class="card shadow">
                                    <img class="card-img-top img-fluid" src="{{route('resizer', ['photo' => $item->image, 'width' => 253, 'height' => 253] )}}" alt="{{ asset('images/'.$item->image) }}">
                                <div class="card-body text-center text-success">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

        </div>
    </div>

@endsection
