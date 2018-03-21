@extends('layouts.master')

@section('content')
<link href="/css/starter-template.css" rel="stylesheet">

      <div class="starter-template">

	      <h1>Homes List</h1>
	      <ul class="list-group">

	      @foreach ($homes as $home)
	      	<li class="list-group-item">
	      		<a href="/homes/{{ $home->id }}">
	        		{{$home->title}}
	        	</a>
	        </li>
			@endforeach

			</ul>
      </div>
@endsection