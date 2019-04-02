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
                                        <a class="nav-pills-size custom-nav-pills bg-light {{ $category == 'native bags' ? 'custom-nav-pills-active text-success' : 'custom-nav-pills-inactive' }}" href="/admin_dashboard/products/native bags/category">
                                            <p class="nav-pills-v-center"><i class="fas fa-shopping-bag fa-2x"></i></p>
                                            <p>Native Bags</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-pills-size custom-nav-pills bg-light {{ $category == 'handicrafts' ? 'custom-nav-pills-active text-success' : 'custom-nav-pills-inactive' }}" href="/admin_dashboard/products/handicrafts/category">
                                            <p class="nav-pills-v-center"><i class="fas fa-gavel fa-2x"></i></p>
                                            <p>Handicrafts</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-pills-size custom-nav-pills bg-light {{ $category == 'food' ? 'custom-nav-pills-active text-success' : 'custom-nav-pills-inactive' }}" href="/admin_dashboard/products/food/category">
                                            <p class="nav-pills-v-center"><i class="fas fa-utensils fa-2x"></i></p>
                                            <p>Food</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-pills-size custom-nav-pills bg-light {{ $category == 'health' ? 'custom-nav-pills-active text-success' : 'custom-nav-pills-inactive' }}" href="/admin_dashboard/products/health/category">
                                            <p class="nav-pills-v-center"><i class="fas fa-spa fa-2x"></i></p>
                                            <p>Health</p>
                                        </a>
                                      </li>
                                    </ul>
                            </div>
                </div>
            </div>
        </nav>

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