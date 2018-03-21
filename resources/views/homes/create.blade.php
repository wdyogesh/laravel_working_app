@extends('layouts.master')

@section('content')
<link href="/css/starter-template.css" rel="stylesheet">


     <div class="starter-template">

     <h1>Add Home</h1>

     <hr>

		<form method="POST" action="/homes">

		{{csrf_field()}}

			<div class="form-group">

		    	<label for="host_id">Host ID</label>
		    	<input type="text" class="form-control" id="host_id" name="host_id" >

		  	</div>

		 	<div class="form-group">

		    	<label for="title">Title</label>
		    	<input type="text" class="form-control" id="title" name="title" >

		  	</div>

		  	<div class="form-group">

		    	<label for="description">Description</label>
		    	<input type="text" class="form-control" id="description" name="description" >

		  	</div>

		  	<div class="form-group">

		    	<label for="address">Address</label>
		    	<input type="text" class="form-control" id="address" name="address" >

		  	</div>

		  	<div class="form-group">

		    	<label for="postcode">Postcode</label>
		    	<input type="text" class="form-control" id="postcode" name="postcode" >

		  	</div>

		  	<div class="form-group">

		  		<button type="submit" class="btn btn-primary">Submit</button>

		  	</div>

		 	@include('layouts.errors')

		</form>

	</div>



@endsection