@if($errors->any())
	<div class="col-md-12 mt-4 d-flex align-items-center flex-column" role="alert">
		@foreach($errors->all() as $error)
			<div class="col-md-5 alert alert-danger text-center">
				{{ $error }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endforeach
	</div>
@endif