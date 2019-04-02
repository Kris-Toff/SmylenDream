@extends('master/master-public')

@section('title')
    {{ $search }} | Smylen Dream
@endsection

@section('content')

<div class="container-fluid">

    <div class="row my-3">
        <div class="col-md-12">
            <h3>Search result for "{{ $search }}"</h3>

            @if ($products->count() <= 0 && $posts->count() <= 0)
                <h4>Nothing Found!</h4>
            @endif

        </div>
    </div>

    @if ($products->count() > 0)

        <div class="row text-center">
            <div class="col-md-12 align-self-center">
                <h3 class="playfair-font font-weight-bold text-success">Products</h3>
            </div>
        </div>

        <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                <a class="social-link" href="/{{ $product->id }}/view">
                    <div class="card shadow">
                        <img class="card-img-top img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                        <div class="card-body text-center text-success">
                            <h5 class="card-title">{{ $product->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>

        @include('/master/components/navigation/pagination')

        
        <br>
        <hr>
        <br>
    @endif

    @if ($posts->count() > 0)
        
        <div class="row text-center">
            <div class="col-md-12 align-self-center">
                <h3 class="playfair-font font-weight-bold text-success">Blog</h3>
            </div>
        </div>

        <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('images/'.$post->featured_image) }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <sup><strong>{{ $post->created_at->format('F d, Y') }} by {{ $post->author }}</strong></sup>
                    <p class="card-text text-truncate">{{ $post->short_description }}</p>
                    <a href="/blog/post/{{ $post->slug }}" class="btn btn-primary">Read more...</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="row mt-5 justify-content-center">
            {{ $posts->links() }}
        </div>
    @endif
    
</div>
    
@endsection
