@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-success">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-success d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="col-md-12 d-flex justify-content-end">
                                <div class="col-sm-6">
                                    <form method="GET" action="/admin_dashboard/products/{product}/search">
                                        <div class="input-group d-flex align-items-center">
                                        <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ $search }}">
                                            <div class="input-group-append">
                                                <button class="btn smylen-btn" type="submit" id="button-addon2">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                        </div>
                </div>
            </div>
        </nav>

        <div class="row">
            <h4 class="posts-margin">Search Result for "{{ $search }}"</h4>
        </div>

        <div class="row">
            
            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6 mt-4">
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
    
        {{-- @include('/master/components/navigation/pagination') --}}
    </div>
</div>
@endsection