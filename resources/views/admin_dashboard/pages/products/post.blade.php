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
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="{{ url('admin_dashboard/products/new') }}">
                                    <p class="nav-pills-v-center"><i class="far fa-plus-square fa-2x"></i></p>
                                    <p>New</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/admin_dashboard/products/native bags/category">
                                    <p class="nav-pills-v-center"><i class="fas fa-shopping-bag fa-2x"></i></p>
                                    <p>Native Bags</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/admin_dashboard/products/handicrafts/category">
                                    <p class="nav-pills-v-center"><i class="fas fa-gavel fa-2x"></i></p>
                                    <p>Handicrafts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/admin_dashboard/products/food/category">
                                    <p class="nav-pills-v-center"><i class="fas fa-utensils fa-2x"></i></p>
                                    <p>Food</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-pills-size custom-nav-pills bg-light custom-nav-pills-inactive" href="/admin_dashboard/products/health/category">
                                    <p class="nav-pills-v-center"><i class="fas fa-spa fa-2x"></i></p>
                                    <p>Health</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row justify-content-end">
            <div class="col-md-5 col-sm-12">
                <form method="GET" action="/admin_dashboard/products/search">
                    <div class="input-group d-flex align-items-center">
                        <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn smylen-btn" type="submit" id="button-addon2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6 mt-4">
                        <a class="social-link" href="/admin_dashboard/products/{{ $product->id }}/view">
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
    </div>
</div>
@endsection