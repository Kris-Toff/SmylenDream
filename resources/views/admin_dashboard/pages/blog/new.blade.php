@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">
        <form method="POST" action="/admin_dashboard/blog" enctype="multipart/form-data">
        @csrf
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="list-inline pt-3">
                    <li class="list-inline-item"> 
                        <button type="button" id="sidebarCollapse" class="btn btn-success">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-outline-success">Publish</button>
                    </li>
                </ul>
            </div>
        </nav>

        @include('admin_dashboard/components/errors/errors')

        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12 card py-3">
                    <h5>Title :</h5>
                    <input type="text" name="title" required class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                </div>
            </div>
           <div class="col-md-6">
               <div class="col-md-12 card py-3">
                    <h5>Author :</h5>
                    <input type="text" name="author" required class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}" value="{{ old('author') }}">
               </div>
           </div>
        </div>

        
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="col-md-12 card py-3">
                    <h5>Status :</h5>
                    <select name="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                        <option value="visible">Visible</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 card py-3">
                    <h5>Featured Image :</h5>
                    <input type="file" name="featured_image" required class="form-control {{ $errors->has('featured_image') ? ' is-invalid' : '' }}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12 card py-3">
                    <h5>Short Description : </h5>
                    <textarea class="form-control" name="short_description" rows="4" cols="80" required>{{ old('short_description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12 card py-3">
                    <h5>Content :</h5>
                    <textarea name="content" required id="editor1" rows="10" cols="80">
                        {{ old('content') }}
                    </textarea>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<script>

</script>
@endsection