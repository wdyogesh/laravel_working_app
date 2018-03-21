@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('partner.student.create') }}">Add Students</a>
		</nav>

		<h1>Student listing</h1>
		@if($students->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Student name</th>
						<th>E-Mail</th>
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
										2 - Booking confirmed
									@elseif($student->booking->status == 3)
										3 - Booking cancel
									@endif
								@else
									<a href="{{ route('partner.booking.create', $student->user_id) }}">Criar booking</a>
								@endif
							</td>
							<td>
								<a href="{{ route('partner.student.show', $student->user_id) }}" title='See student details' class='waves-effect waves-light btn'><i class='material-icons right'>visibility</i></a>
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