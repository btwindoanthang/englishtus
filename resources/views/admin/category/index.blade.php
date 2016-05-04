@extends('layouts.admin')

@section('content')
<div class="container">
	

	<div class="row">
		
		<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="button" class="btn btn-primary">Download</button>
        <a href="/admin/add"><button type="button" class="btn btn-primary">Add</button></a>
      </form>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Image</th>
				<th>Video</th>
				<th>Acction</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@foreach ($categorys as $category)
			        
			        <td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->image }}</td>
					<td>{{ $category->video }}</td>
					<td><button type="button" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-danger">Delete</button></td>
			    @endforeach
				
			</tr>
		</tbody>
	</table>
	<div class="row">
		{!! $categorys->links() !!}

	</div>
</div>
@endsection