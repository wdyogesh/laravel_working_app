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
						<th>Partner</th>
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
								<a href=" {{ route('admin.student.show', $booking->student->user_id) }} ">
									{{ $booking->student->user->first_name }}
								</a>
							</td>
							<td>
								@if($booking->vacancy->id == 1)
									Missing host match.
								@else
									<a href=" {{ route('admin.host.show', $booking->vacancy->house->user_id) }} ">
										{{ $booking->vacancy->house->user->first_name.' '.$booking->vacancy->house->user->last_name }}
									</a>
								@endif
							</td>
							<td>
								<a href=" {{ route('admin.partner.show', $booking->partner->user_id) }} ">
									{{ $booking->partner->business_name }}
								</a>
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
								@if($booking->status == 1)
									<a href="{{ route('booking.match', $booking->id) }}" title='Find a host' class='waves-effect waves-light btn' href=""><i class='material-icons right'>search</i></a>
									<a href="{{ route('booking.edit', $booking->id) }}" title='Edit booking' class='waves-effect waves-light btn' href=""><i class='material-icons right'>edit</i></a>
									<a href="" title='Cancel booking' class='waves-effect waves-light btn' href=""><i class='material-icons right'>cancel</i></a>
								@elseif($booking->status == 2)
									<a href="{{ route('admin.booking.show', $booking->id) }}" title='See booking details' class='waves-effect waves-light btn' href=""><i class='material-icons right'>visibility</i></a>
									<a href="" title='Cancel booking' class='waves-effect waves-light btn' href=""><i class='material-icons right'>cancel</i></a>
								@elseif($booking->status == 3)
									<a href="" title='See booking details' class='waves-effect waves-light btn' href=""><i class='material-icons right'>visibility</i></a>
									<a href="" title='Cancel booking' class='waves-effect waves-light btn' href=""><i class='material-icons right'>cancel</i></a>
								@elseif($booking->status == 4)
									<a href="" title='See booking details' class='waves-effect waves-light btn' href=""><i class='material-icons right'>visibility</i></a>
								@endif
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