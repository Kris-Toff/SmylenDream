@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="list-inline pt-3">
                    <li class="list-inline-item"> 
                        <button type="button" id="sidebarCollapse" class="btn btn-success">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <h3>Comments</h3>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered text-center bg-light">
                    <thead class="bg-success text-light">
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Author</th>
                            <th scope="col">Comment</th>
                            <th scope="col">In Response To</th>
                            <th scope="col">Status</th>
                            <th scope="col">Submitted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <a href="/admin_dashboard/blog/comment/{{ $comment->id }}/reply" class="btn btn-primary">Read</a>
                                </td>
                                <td>{{ $comment->name }}</td>
                                <td class="text">
                                    <span>{{ $comment->body }}</span>
                                </td>
                                <td>{{ $comment->title }}</td>
                                <td>{{ $comment->status }}</td>
                                <td scope="row">
                                    {{ $comment->created_at->format('F d, Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mt-5 justify-content-center">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection