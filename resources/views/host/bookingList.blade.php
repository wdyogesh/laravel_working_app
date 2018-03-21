@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Booking list</h1>
		@if($bookings->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Booking Number</th>
						<th>Student</th>
						<th>Country</th>
						<th>Check-In</th>
						<th>Check-Out</th>
						<th>Chat</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $booking)
						<tr>
							<th scope='row'>
								{{ $booking->id }}
							</th>
							<td>
								<a href="{{ route('host.student', $booking->student->user_id) }}">{{ $booking->student->user->first_name }}</a>
							</td>
							<td>
								{{ $booking->student->country }}
							</td>
							<td> 
								{{ $booking->checkin }}
							</td>
							<td>
								{{ $booking->checkout }}
							</td>
							<td>
								<a href="{{ route('chat', ['student_id' => $booking->student_id , 'host_id' => $booking->vacancy->house->user_id]) }}" title='Chat' class='waves-effect waves-light btn'><i class='material-icons right'>chat</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>No bookings found.</h5>
		@endif

	</div>



@endsection