@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">

    <form method="POST" action="/admin_dashboard/products" enctype="multipart/form-data" id="myform">
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
                        <h4 class="posts-margin">Post</h4>
                    </li>
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </li>
                </ul> 
            </div>
        </nav>

            @include('admin_dashboard/components/errors/errors')

            <div class="row custom-margin-top justify-content-center">

                <div class="col-md-5 card py-3">
                    <label for="Item Name" class="lead">Name :</label>  
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">

                    <label for="Price" class="lead">Price :</label>  
                    <input type="number" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}" min="0" step="0.01">

                    <label for="Description" class="lead">Short Description :</label>  
                <textarea name="short_description" cols="30" rows="5" class="form-control {{ $errors->has('short_description') ? ' is-invalid' : '' }}" maxlength="255">{{ old('short_description') }}</textarea>
                </div>

                <div class="col-md-5 card py-3">
                    <label class="lead">Image</label>
                    <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">

                    <label class="lead">Category :</label>
                    <select name="category" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}">
                        <option value="native bags">Native Bags</option>
                        <option value="handicrafts">Handicrafts</option>
                        <option value="food">Food</option>
                        <option value="health">Health</option>
                    </select>

                    <label class="lead">Additional Information :</label>
                <textarea name="additional_information" cols="30" rows="5" class="form-control {{ $errors->has('additional_information') ? ' is-invalid' : '' }}">{{ old('additional_information') }}</textarea>
                </div>
            </div>
            <div class="row justify-content-center my-3">
                <div class="col-md-6 card py-3">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td colspan="3"><h5>Dimensions</h5></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dimension0" class="form-control" placeholder="Measurement"></td>
                            <td><input type="text" name="dimension2" class="form-control" placeholder="Measurement"></td>
                            <td><input type="text" name="dimension4" class="form-control" placeholder="Measurement"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dimensionVal1" class="form-control" placeholder="Value"></td>
                            <td><input type="text" name="dimensionVal3" class="form-control" placeholder="Value"></td>
                            <td><input type="text" name="dimensionVal5" class="form-control" placeholder="Value"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection