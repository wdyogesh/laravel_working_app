@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Student matching</h1>
		@if($vacancies->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Host name</th>
						<th>Home Title</th>
						<th>Room Name</th>
						<th>City</th>
						<th>Agency</th>
						<th>%</th>
						<th>Not matching criteria</th>
						<th>Match</th>
					</tr>
				</thead>
				<tbody>
					@foreach($vacancies as $vacancy)
						
						<tr>
							<th scope='row'>
								{{ $vacancy->house->user->first_name . ' ' . $vacancy->house->user->last_name }}
							</th>
							<td>
								{{ $vacancy->house->title }}
							</td>
							<td> 
								{{ $vacancy->title }}
							</td>
							<td>
								{{ $vacancy->house->city }}
							</td>
							<td>
								{{ $booking->partner->business_name }}
							</td>
							<td>
								@php 
									$match = 0;
									$filters = array();

									if($student->smoke == 1 and $vacancy->house->user->host->can_students_smoke == 0)
									{
										$filters[] = 'Smoke';
									}else{
										$match = $match + 0.25;
									}

									if($student->objec_pets == 1 and $vacancy->house->user->host->have_pets == 1)
									{
										$filters[] = 'Pets';
									}else{
										$match = $match + 0.25;
									}

									if($student->objec_kids == 1 and $vacancy->house->user->host->have_kids == 1)
									{
										$filters[] = 'Kids';
									}else{
										$match = $match + 0.25;
									}

									if($student->dietary_request == 1 and $vacancy->house->user->host->special_dietarian  == 0)
									{
										$filters[] = 'Special Dietarian';
										
									}else{
										$match = ($match + 0.25); 
									}

									echo ($match * 100).'%';
								@endphp
							</td>
							<td>
								@php
									print_r($filters);
								@endphp
							</td>
							<td> 
								<form action="{{ route('booking.match.making', ['booking_id' => $booking->id , 'vacancy_id' => $vacancy->id]) }}" method="POST">
								    <input type="hidden" name="_method" value="put">
								    {{ csrf_field() }}
								    <button class="btn btn-primary" type="submit">Book</button>
								</form>

								{{$booking->id}}
								{{$vacancy->house->user->host->id}}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>No vacancy available.</h5>
		@endif

	</div>



@endsection