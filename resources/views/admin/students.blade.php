@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Student listing</h1>
		@if($students->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Student name</th>
						<th>E-Mail</th>
						<th>Gender</th>
						<th>City</th>
						<th>Partner</th>
						<th>Host type</th>
						<th>Check-in</th>
						<th>Check-out</th>
						<th>Booking status</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
						<tr>
							<th scope='row'>
								{{ $student->user->first_name . ' ' . $student->user->last_name }}
							</th>
							<td>
								{{ $student->user->email }}
							</td>
							<td>
								{{ $student->gender }}
							</td>
							<td> 
								@if($student->booking)
									{{ $student->booking->city }}
								@else
									Estudante sem booking!
								@endif
							</td>
							<td> 
								@if($student->booking)
									{{ $student->booking->partner->business_name }}
								@else
									Estudante sem booking!
								@endif
							</td>
							<td> 
								@if($student->booking)
									{{ $student->booking->host_type }}
								@else
									Estudante sem booking!
								@endif
							</td>
							<td> 
								@if($student->booking)
									{{ $student->booking->checkin }}
								@else
									Estudante sem booking!
								@endif
							</td>
							<td>
								@if($student->booking)
									{{ $student->booking->checkout }}
								@else
									Estudante sem booking!
								@endif
							</td>
							<td>
								@if($student->booking)
									@if($student->booking->status == 1)
										1 - Pending match
									@elseif($student->booking->status == 2)
										<a href=" {{ route('admin.booking.show', $student->booking->id) }} ">
											2 - Booking confirmed
										</a>
									@elseif($student->booking->status == 3)
										3 - Booking cancel
									@endif
								@else
									Estudante sem booking!
								@endif
							</td>
							<td>
								<a href=" {{ route('admin.student.show', $student->user_id) }} " title='View student profile' class='waves-effect waves-light btn'><i class='material-icons right'>visibility</i></a>
								<a href=" {{ route('admin.log.index', $student->user_id) }} " title='Logs' class='waves-effect waves-light btn'><i class='material-icons right'>assignment</i></a>
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