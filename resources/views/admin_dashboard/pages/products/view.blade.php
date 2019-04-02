@extends('/master/master-admin')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
    @include('/admin_dashboard/components/navigation/nav')

    <!-- Page Content  -->
    <div id="content">
    
    <form method="POST" action="/admin_dashboard/{{ $product->id }}/products" enctype="multipart/form-data">
        @method('PATCH')
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
                        <h4 class="posts-margin">Action</h4>
                    </li>
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-outline-success mr-1">Update</button>
                    </li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete">Delete</button>
                    </li>
                </ul>
                
            </div>
        </nav>

            @include('admin_dashboard/components/errors/errors')

            <div class="row justify-content-center">
                <div class="col-md-4 card py-3">
                        <img class="img-fluid" src="{{ asset('/images/'.$product->image) }}" alt="{{ $product->image }}">
                        <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                
                <div class="col-md-5 card py-3">
                    <label for="Item Name" class="lead">Name : </label>  
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">

                    <label for="Price" class="lead">Price :</label>  
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" min="0" step="0.01">

                    <label for="Description" class="lead">Short Description :</label>  
                    <textarea name="short_description" cols="30" rows="5" class="form-control" maxlength="255">{{ $product->short_description }}</textarea>
                </div>

                <div class="col-md-5 card py-3">
        
                    <label class="lead">Category :</label>
                    <select name="category" class="form-control">
                        <option value="native bags" {{ $product->category == 'native bags' ? 'selected' : '' }}>Native Bags</option>
                        <option value="handicrafts" {{ $product->category == 'handicrafts' ? 'selected' : '' }}>Handycrafts</option>
                        <option value="food" {{ $product->category == 'food' ? 'selected' : '' }}>Food</option>
                        <option value="health" {{ $product->category == 'health' ? 'selected' : '' }}>Health</option>
                    </select>

                    <label class="lead">Additional Information :</label>
                    <textarea name="additional_information" cols="30" rows="5" class="form-control">{{ $product->additional_information }}</textarea>
                </div>
            </div>
            
            <div class="row justify-content-center py-3">
                <div class="col-md-6 card py-3">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="3"><h5>Dimensions</h5></td>
                            </tr>
                            
                            @if (count($dimensions) != 0)
                                <tr>
                                    @for ($i = 0; $i < count($dimensions) ; $i+=2)
                                        <td><input type="text" name="dimension{{ $i }}" class="form-control" value="{{ $dimensions[$i] }}" placeholder="Measurement"></td>
                                    @endfor

                                    @if (count($dimensions) == 2 )
                                        <td><input type="text" name="dimension2" class="form-control" placeholder="Measurement"></td>
                                        <td><input type="text" name="dimension4" class="form-control" placeholder="Measurement"></td>
                                    @elseif(count($dimensions) == 4)
                                        <td><input type="text" name="dimension4" class="form-control" placeholder="Measurement"></td>
                                    @endif
                                </tr>
                                <tr>
                                    @for ($i = 1; $i < count($dimensions) ; $i+=2)
                                        <td><input type="text" name="dimensionVal{{ $i }}" class="form-control" value="{{ $dimensions[$i] }}" placeholder="Measurement"></td>
                                    @endfor	

                                    @if (count($dimensions) == 2 )
                                        <td><input type="text" name="dimensionVal3" class="form-control" placeholder="Measurement"></td>
                                        <td><input type="text" name="dimensionVal5" class="form-control" placeholder="Measurement"></td>
                                    @elseif(count($dimensions) == 4)
                                        <td><input type="text" name="dimensionVal5" class="form-control" placeholder="Measurement"></td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <td><input type="text" name="dimension0" class="form-control" placeholder="Measurement"></td>
                                    <td><input type="text" name="dimension2" class="form-control" placeholder="Measurement"></td>
                                    <td><input type="text" name="dimension4" class="form-control" placeholder="Measurement"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="dimensionVal1" class="form-control" placeholder="Measurement"></td>
                                    <td><input type="text" name="dimensionVal3" class="form-control" placeholder="Measurement"></td>
                                    <td><input type="text" name="dimensionVal5" class="form-control" placeholder="Measurement"></td>
                                </tr>
                            @endif
                        </table>
                </div>
            </div>
        </form>

        <!-- Modal -->
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
                                    <form method="POST" action="/admin_dashboard/{{ $product->id }}/products" >
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
    </div>
</div>
@endsection