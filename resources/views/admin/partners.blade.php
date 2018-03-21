@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Partner listing</h1>
		@if($partners->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Host name</th>
						<th>E-Mail</th>
						<th>Mobile number</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($partners as $partner)
						<tr>
							<th scope='row'>
								{{ $partner->user->first_name . ' ' . $partner->user->last_name }}
							</th>
							<td>
								{{ $partner->user->email }}
							</td>
							<td>
								{{ $partner->phone_number }}
							</td>
							<td>
								<a href="{{ route('admin.partner.show', $partner->user->id) }}" title='View partner profile' class='waves-effect waves-light btn' ><i class='material-icons right'>visibility</i></a>
								<a href=" {{ route('admin.log.index', $partner->user->id) }} " title='Logs' class='waves-effect waves-light btn' ><i class='material-icons right'>assignment</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>Partners not found.</h5>
		@endif

	</div>



@endsection