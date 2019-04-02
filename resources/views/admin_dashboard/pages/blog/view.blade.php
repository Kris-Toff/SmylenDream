@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">
    <form method="POST" action="/admin_dashboard/blog/{{ $post->slug }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="list-inline pt-3">
                    <li class="list-inline-item"> 
                        <button type="button" id="sidebarCollapse" class="btn btn-success">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-outline-success">Update</button>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete">Delete</a>
                    </li>
                </ul>
            </div>
        </nav>

        @include('admin_dashboard/components/errors/errors')

        <div class="row mt-3">
           <div class="col-md-6">
               <div class="col-md-12 card py-3">
                    <h5>Title :</h5>
                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $post->title }}" required>
               </div>
           </div>
           
           <div class="col-md-6">
                <div class="col-md-12 card py-3">
                     <h5>Author :</h5>
                     <input type="text" name="author" class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}" value="{{ $post->author }}" required>
                </div>
            </div>
        </div>

        
        <div class="row mt-3">
            <div class="col-md-6"> 
                <div class="col-md-12 card py-3">
                        <h5>Status :</h5>
                        <select name="status" class="form-control">
                            <option {{ $post->status == 'visible' ? 'selected' : '' }} value="visible">Visible</option>
                        <option {{ $post->status == 'hidden' ? 'selected' : '' }} value="hidden">Hidden</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 card py-3">
                    <h5>Featured Image : <a href="#" data-toggle="modal" data-target="#featured">Click here to view</a></h5>
                    <input type="file" name="featured_image" class="form-control {{ $errors->has('featured_image') ? ' is-invalid' : '' }}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12 card py-3">
                    <h5>Short Description : </h5>
                    <textarea class="form-control"name="short_description" rows="5" cols="80" required>{{ $post->short_description }}</textarea>
                 </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12 card py-3">
                    <h5>Content :</h5>
                    <textarea name="content" id="editor1" rows="10" cols="80" required>
                        {{ $post->content }}
                    </textarea>
                </div>
            </div>
        </div>
    
    </form> 
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmation" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                <h3 class="modal-title" id="deleteConfirmation">Delete?</h3>
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
                            <form method="POST" action="/admin_dashboard/blog/{{ $post->slug }}" >
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

    <!-- Modal Featured Image -->
    <div class="modal fade" id="featured" tabindex="-1" role="dialog" aria-labelledby="viewFeaturedImage" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="viewFeaturedImage">Featured Image</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('images/'.$post->featured_image) }}" alt="Featured Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection