@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Booking listing</h1>
		@if($bookings->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Booking Number</th>
						<th>Student</th>
						<th>Host</th>
						<th>Check-In</th>
						<th>Check-Out</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $booking)
						<tr>
							<th scope='row'>
								{{ $booking->id }}
							</th>
							<td>
								<a href="{{ route('partner.student.show', $booking->student->user_id) }}">{{ $booking->student->user->first_name }}</a>
							</td>
							<td>
								@if($booking->vacancy->id == 1)
									Missing host match.
								@else
									<a href="{{ route('partner.host.show', $booking->vacancy->house->user->id) }}">
									{{ $booking->vacancy->house->user->first_name.' '.$booking->vacancy->house->user->last_name }}</a>
								@endif
							</td>
							<td> 
								{{ $booking->checkin }}
							</td>
							<td>
								{{ $booking->checkout }}
							</td>
							<td>
								@if($booking->status == 1)
									1 - Pending match
								@elseif($booking->status == 2)
									2 - Booking confirmed - Missing information
								@elseif($booking->status == 3)
									3 - Booking confirmed
								@elseif($booking->status == 4)
									4 - Booking cancel
								@endif
							</td>
							<td>
								<a href="{{ route('partner.booking.show', $booking->id) }}" title='See booking details' class='waves-effect waves-light btn'><i class='material-icons right'>visibility</i></a>
								<a href="" title='Download invoice' class='waves-effect waves-light btn'><i class='material-icons right'>receipt</i></a>
								<!--
								<a href="" title='Delete booking' class='waves-effect waves-light btn'><i class='material-icons right'>delete</i></a>
								-->
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