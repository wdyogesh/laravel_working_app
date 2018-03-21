@extends('layouts.master')

@section('content')
	
	<div class="starter-template">

        @include('layouts.header')

        <nav class="breadcrumb">
			<a class="breadcrumb-item" href=" {{ route('admin.user.create') }} ">Add user</a>
			<a class="breadcrumb-item" href=" {{ route('admin.user.role.index') }} ">Manage roles</a>
		</nav>

		<h1>User listing</h1>
		@if($users->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>User name</th>
						<th>E-Mail</th>
						<th>Permission</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<th scope='row'>
								{{ $user->first_name . ' ' . $user->last_name }}
							</th>
							<td>
								{{ $user->email }}
							</td>
							<td>
								@if($user->isAdmin())
									Admin
								@elseif($user->isHost())
									Host
								@elseif($user->isPartner())
									Partner
								@else
									Student
								@endif
							</td>
							<td>
								<a href=" {{ route('admin.user.show', $user->id) }} " title='View student profile' class='waves-effect waves-light btn'><i class='material-icons right'>visibility</i></a>
								<a href="" title='Logs' class='waves-effect waves-light btn'><i class='material-icons right'>assignment</i></a>
								@if($user->isAdmin())
									<a href=" {{ route('admin.user.role.show', $user->id) }} " title='Manage role' class='waves-effect waves-light btn'><i class='material-icons right'>security</i></a>
								@endif
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