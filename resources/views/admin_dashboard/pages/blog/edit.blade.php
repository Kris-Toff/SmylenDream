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
                    <li class="list-inline-item"><h3>Edit Reply</h3></li>
                </ul>
            </div>
        </nav>

        @include('admin_dashboard/components/errors/errors')

        <form method="POST" action="/admin_dashboard/blog/reply/{{ $reply->id }}" >
            @method('PATCH')
            @csrf
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="col-md-12 card py-3">
                        <label>Author *</label>
                    <input type="text" name="author" class="form-control" value="{{  !empty($reply->author) ? $reply->author : '' }}" required>
                    </div>
                    <div class="col-md-12 card py-3">
                        <label>Reply *</label>
                        <textarea name="body" class="form-control" cols="30" rows="5" required>{{  !empty($reply->body) ? $reply->body : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                    <div class="col-md-3 col-sm-12 card py-3">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection