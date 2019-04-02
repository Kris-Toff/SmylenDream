@extends('master/master-public')

@section('title')
    {{ $post->title }} - {{ $post->author }}
@endsection

@section('meta')
	<meta name="description" content="{{ $post->short_description }}">
	<meta name="keywords" content="Blog, SmylenDream, Smylen Dream, Virgin Coconut Oil,Extra Virgin Coconut Oil, VCO, Coconut Oil, Siquijor, Island, Native Bags, Handicrafts">
    <meta property="og:site_name" content="Smylen Dream">
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="blog" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->short_description }}" />
    <meta property="og:image" content="{{ asset('images/'.$post->featured_image) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- Products -->
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-8 card py-3">
                <h1 class="font-weight-bold">{{ $post->title }}</h1>
                <h6 class="font-weight-bold">{{ $post->created_at->format('F d, Y') }} by {{ $post->author }}</h6>
            </div>
        </div>
    </div>
</div>
    
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-8 card py-3">
                {!! $post->content !!}
                <div class="fb-share-button ml-3" 
                    data-href="{{ url()->full() }}" 
                    data-layout="button" 
                    size="large">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-start">
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <form id="commentForm">
                    <h4>Post a comment</h4>
                    <hr>
                    <input id="post_id" type="hidden" name="id" value="{{ $post->id }}">
                    <p>Name * </p>
                    <input id="name" type="text" name="name" class="form-control" required>
                    <p>Comment * </p>
                    <textarea id="body" name="body" class="form-control" rows="5" required></textarea>
                    <div class="col d-flex justify-content-end my-1">
                        <button id="postComment" class="btn btn-primary">Post Comment</button>
                    </div>
                    <small class="alert alert-info">*Note : Your comments needs to be approved by the author to be visible.</small>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-start">
        <div class="col-md-2"></div>
            <div id="comments" class="col-md-8">

                <h4>Comments</h4>
                <span id="recent"></span>
                @foreach ($comments as $comment)
                    <div class="col-md-12 alert-success border rounded py-1 my-1">
                        <h5><strong>{{ $comment->name }}</strong></h5>
                        <p><strong style="font-size:12px;">{{ $comment->created_at->format('F d, Y') }}</strong></p>
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                    @foreach ($replies as $reply)
                        @if ($reply->comment_id == $comment->id)
                            <div class="col-md-12">
                                <div class="col-md-12 alert-success border rounded py-1 ml-3 my-1">
                                        <strong>{{ $reply->author }}</strong><br>
                                        <sub><strong>{{ $reply->created_at->format('F d, Y') }}</strong></sub>
                                        <br><br>
                                        <p>
                                            {{ $reply->body }}
                                        </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                            
                <span id="load"></span>

                @if ($totalComments > 10)
                    <div class="col-md-12 d-flex justify-content-center my-2">
                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                        <button id="loadMore" class="btn btn-primary">Load more comments</button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
