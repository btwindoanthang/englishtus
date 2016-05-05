@extends('layouts.admin')

@section('content')
<div class="container">
	@include('common.errors')
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="/admin/addcategory" method="POST" role="form" enctype="multipart/form-data">
				<legend>Add Category</legend>

				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Input field">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="">Image</label>
							<input type="file" class="form-control" name="image" id="image" placeholder="Input field">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="">Video</label>
							<input type="file" class="form-control" id="video" name="video" placeholder="Input field">
						</div>
					</div>

				</div>
				
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection