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
                        <ul class="list-inline pt-3">
                            <li class="list-inline-item">
                                <h3>Posts</h3>
                            </li>
                            <li class="list-inline-item">
                                <a href="/admin_dashboard/blog/new" class="btn btn-outline-success mb-1" title="Add New">Add New</a>
                            </li>
                            {{-- <div class="col-md-5 col-sm-12 float-right">
                                    <form method="GET" action="/admin_dashboard/blog/{post}/search">
                                        <div class="input-group d-flex align-items-center">
                                            <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn smylen-btn" type="submit" id="button-addon2">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  --}}
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered text-center bg-light">
                    <thead class="bg-success text-light">
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                            <td><a href="/admin_dashboard/blog/{{ $post->slug }}/edit" class="btn btn-primary">Edit</a></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{  $post->created_at->format('F d, Y') }}</td>
                                <td scope="row">{{ $post->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('/admin_dashboard/components/navigation/pagination')
            </div>
        </div>
    </div>
</div>
@endsection