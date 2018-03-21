@extends('layouts.master')

@section('content')
	
	<div class="starter-template">

        @include('layouts.header')

        <nav class="breadcrumb">
			<a class="breadcrumb-item" href=" {{ route('admin.user.role.create') }} ">Add roles</a>
		</nav>

		<h1>Roles listing</h1>
		@if($roles->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Role name</th>
						<th>Description</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $role)
						<tr>
							<th scope='row'>
								{{ $role->friendly_name }}
							</th>
							<td>
								{{ $role->description }}
							</td>
							<td>
								<a href="  " title='Edit role' class='waves-effect waves-light btn'><i class='material-icons right'>edit</i></a>
								<a href="" title='Delete role' class='waves-effect waves-light btn'><i class='material-icons right'>delete</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>Students not found.</h5>
		@endif

	</div>



@endsection