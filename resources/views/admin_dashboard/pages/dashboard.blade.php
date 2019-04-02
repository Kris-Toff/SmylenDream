@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a class="navbar-brand" href="/admin_dashboard">
                <img style="width:170px;" src="{{ asset('images/smylen-logo.png') }}" alt="logo">
            </a>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#"><i class="fas fa-store"></i> Products</a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fab fa-blogger-b"></i> Blog</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i> {{ Auth::user()->username }}
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a class="dropdown-item text-success" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

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