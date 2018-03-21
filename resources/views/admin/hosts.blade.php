@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Hosts listing</h1>
		@if($hosts->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Host name</th>
						<th>E-Mail</th>
						<th>Mobile number</th>
						<th>City</th>
						<th>Availability</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($hosts as $host)
						<tr>
							<th scope='row'>
								{{ $host->user->first_name . ' ' . $host->user->last_name }}
							</th>
							<td>
								{{ $host->user->email }}
							</td>
							<td>
								{{ $host->mobile_number }}
							</td>
							<td>
								City
							</td>
							<td>
								Availability
							</td>
							<td>
								@if($host->status == 0)
						    		Host pending approval
						    	@elseif($host->status == 1)
						    		Host approved
						    	@elseif($host->status == 2)
						    		Host on hold
						    	@endif
							</td>
							<td>
								<a title='View host profile' class='waves-effect waves-light btn' href=" {{ route('admin.host.show', $host->user_id) }} "><i class='material-icons right'>visibility</i></a>
								<a href=" {{ route('admin.log.index', $host->user->id) }} " title='Logs' class='waves-effect waves-light btn'><i class='material-icons right'>assignment</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>Hosts not found.</h5>
		@endif

	</div>



@endsection