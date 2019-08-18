@extends('master/master-public')

@section('title')
    Smylen Dream Blog
@endsection

@section('meta')
	<meta name="description" content="Smylen Dream Blog Posts, Updates and more.">
	<meta name="keywords" content="Blog, SmylenDream, Smylen Dream, Virgin Coconut Oil,Extra Virgin Coconut Oil, VCO, Coconut Oil, Siquijor, Island, Native Bags, Handicrafts">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-success">Latest Posts</h2>
    </div>
</div>

<div class="container mt-2">
    <div class="row">

            @foreach ($posts as $post)
                <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                    <div class="card shadow">
                      <img class="card-img-top" src="{{route('resizer', ['photo' => $post->featured_image, 'width' => 253, 'height' => 150] )}}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <sup><strong>{{ $post->created_at->format('F d, Y') }} by {{ $post->author }}</strong></sup>
                        <p class="card-text text-truncate">{{ $post->short_description }}</p>
                        <a href="/blog/post/{{ $post->slug }}" class="btn btn-primary">Read more...</a>
                      </div>
                    </div>
                </div>
            @endforeach

            @include('/admin_dashboard/components/navigation/pagination')
    </div>

    {{-- @include('/master/components/navigation/pagination') --}}
</div>

@endsection
