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
                    <li class="list-inline-item"><h3>Reply</h3></li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#status">{{ $comment[0]->status == 'unapproved' ? 'Approve' : 'Unapprove' }}</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete">Delete</a>
                    </li>
                </ul>
            </div>
        </nav>

        @include('admin_dashboard/components/errors/errors')

        <div class="row">
            <div class="col-md-12">
                <h3>Comment</h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12 card py-3">
                    <ul class="list-inline">
                        @foreach ($comment as $object)
                            <li class="list-inline-item border rounded p-1">Name : {{ $object->name }}</li>
                            <li class="list-inline-item border rounded p-1">Response To : {{ $object->title }}</li>
                            <li class="list-inline-item border rounded p-1">Date Submitted : {{ $object->created_at->format('F d, Y') }}</li>
                            <li class="list-inline-item border rounded p-1">Status : {{ $object->status }}</li>
                        @endforeach
                    </ul>
                    <textarea name="comment" class="form-control" cols="30" rows="5" readonly>{{ $comment[0]->body }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Reply</h3>
            </div>
        </div>
    
        <form action="/admin_dashboard/blog/comment/{{ $comment[0]->id }}/reply" method="POST">
            @csrf
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="col-md-12 card py-3">
                        <label>Author *</label>
                    <input type="text" name="author" class="form-control" value="{{  !empty($replies->author) ? $replies->author : '' }}" required>
                    </div>
                    <div class="col-md-12 card py-3">
                        <label>Reply *</label>
                        <textarea name="body" class="form-control" cols="30" rows="5" required>{{  !empty($replies->body) ? $replies->body : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                    <div class="col-md-3 col-sm-12 card py-3">
                        <button class="btn btn-primary">Reply</button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col-md-12">
                <h3>Your Replies</h3>
                @if (!empty($replies))
                    @foreach ($replies as $reply)
                        <div class="col-md-12 card py-3">
                            <p><strong>{{ $reply->author }}</strong> - <small>{{ $reply->created_at->format('F d, Y') }}</small></p>
                            <p>{{ $reply->body }}</p>
                            <ul class="list-inline">
                                <form method="POST" action="/admin_dashboard/blog/reply/{{ $reply->id }}" >
                                    @method('DELETE')
                                    @csrf
                                    <li class="list-inline-item"><a href="/admin_dashboard/blog/reply/{{ $reply->id }}" class="btn btn-info">Edit</a></li>
                                    <li class="list-inline-item"><button class="btn btn-danger">Delete</button></li>
                                </form>
                            </ul>
                        </div> 
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmation" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                <h4 class="modal-title" id="deleteConfirmation">Delete Comment?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="/admin_dashboard/blog/comment/{{ $comment[0]->id }}/reply" >
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Status -->
<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="statusConfirmation" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                <h3 class="modal-title" id="statusConfirmation">{{ $comment[0]->status == 'unapproved' ? 'Approve' : 'Unapprove' }} Comment?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="/admin_dashboard/blog/comment/{{ $comment[0]->id }}/reply" >
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-info btn-lg btn-block">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection