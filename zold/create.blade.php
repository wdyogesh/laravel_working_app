@extends('layouts.master')

@section('content')

    <div class="starter-template">

        @include('layouts.header')

		<h1>Create booking for {{$student->user->first_name . " " . $student->user->last_name}}</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group" method="POST" action="{{ route('partner.booking.store', $student->user_id) }}">
						{{ csrf_field() }}

						<h3>Accommodation Information</h3>
						<div class='form-group row'>
							<label class="col-6 col-md-4 col-form-label" for="host_type">What type of accomodation the student is looking for?</label>
					        	<div class="col-md-8">
										<select class="form-control" id="host_type" name="host_type">
							                <option value="homestay">Homestay</option>
							                <option value="share-house">Share House</option>
							            </select>
								</div>
							</div>

							<div class='form-group row'>
					        	<label class="col-6 col-md-4 col-form-label" for="room_type">What kind of room the student need?</label>
					        	<div class="col-md-8">
									<select class="form-control" id="room_type" name="room_type">
						                <option value="single">Single</option>
						                <option value="two-singles">Two Singles</option>
						                <option value="couple">Couple</option>
						            </select>
								</div>
							</div>
						
						<h3>Preferred location</h3>
						<div class="form-group row{{ $errors->has('city') ? ' has-error' : '' }}">
				            <label for="city" class="col-6 col-md-4 col-form-label">City</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"brisbane" => "Brisbane",
				            		"gold_coast" => "Gold Coast",
				            		"melbourne" => "Melbourne",
				            		"sydney" => "Sydney"
				            	]
				            	@endphp

				            	<select class="form-control" id="city" name="city">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("city"))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				            @if ($errors->has('city'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('city') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('school_name') ? ' has-error' : '' }}">
						    <label for="school_name" class="col-6 col-md-4 col-form-label">School name</label>
							<div class="col col-md-8">
								<input id="school_name" type="text" class="form-control" name="school_name" placeholder="School name" value="{{ old('school_name') }}" required>
							</div>
						</div>

				        <div class="form-group row{{ $errors->has('school_address') ? ' has-error' : '' }}">
				            <label for="school_address" class="col-6 col-md-4 col-form-label">Address</label>
				            <div class="col col-md-8">
				            	<input id="school_address" type="text" class="form-control" name="school_address" placeholder="School address" value="{{ old('school_address') }}" required>
				            </div>
				        </div>

				        <h3>Stay Duration</h3>

				        <div class="form-group row{{ $errors->has('checkin') ? ' has-error' : '' }}">
				            <label for="checkin" class="col-6 col-md-4 col-form-label">Check in</label>
				            <div class="col col-md-8">
				            	<input id="checkin" type="date" class="form-control" name="checkin" placeholder="Check in" value="{{ old('checkin') }}" >
				            </div>
				        </div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="length_stay">Length of stay</label>
				        	<div class="col-md-8">
								<select class="form-control" id="length_stay" name="length_stay">
						            <option value="1">1 week</option>
						            @for($i = 2; $i < 53; $i++)
						            	<option value={{ $i }}>{{ $i }} weeks</option>
						            @endfor
						        </select>
							</div>
						</div>

						<h3>Flight Information</h3>

						<div class="form-group row{{ $errors->has('arrival_date') ? ' has-error' : '' }}">
				            <label for="arrival_date" class="col-6 col-md-4 col-form-label">Arrival date</label>
				            <div class="col col-md-8">
				            	<input id="arrival_date" type="date" class="form-control" name="arrival_date" value="{{ old('arrival_date') }}" required>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('arrival_time') ? ' has-error' : '' }}">
				            <label for="arrival_time" class="col-6 col-md-4 col-form-label">Arrival time</label>
				            <div class="col col-md-8">
				            	<input id="arrival_time" type="text" class="form-control" name="arrival_time" placeholder="Arrival time" value="{{ old('arrival_time') }}" required>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('flight_number') ? ' has-error' : '' }}">
				            <label for="flight_number" class="col-6 col-md-4 col-form-label">Flight number</label>
				            <div class="col col-md-8">
				            	<input id="flight_number" type="text" class="form-control" name="flight_number" placeholder="Flight number" value="{{ old('flight_number') }}" required>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airline_company') ? ' has-error' : '' }}">
				            <label for="airline_company" class="col-6 col-md-4 col-form-label">Airline Company</label>
				            <div class="col col-md-8">
				            	<input id="airline_company" type="text" class="form-control" name="airline_company" placeholder="Airline Company" value="{{ old('airline_company') }}" required>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airport') ? ' has-error' : '' }}">
				            <label for="airport" class="col-6 col-md-4 col-form-label">Airport</label>
				            <div class="col col-md-8">
				            	<input id="airport" type="text" class="form-control" name="airport" placeholder="Airport" value="{{ old('airport') }}" required>
				            </div>
				        </div>

				        <h3>Pick-up Information</h3>

				        <div class="form-group row">
				            <label for="pickup" class="col-6 col-md-4 col-form-label">Does the student need pick-up service?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="pickup" name="pickup">
					                <option value="0">No</option>
					                <option value="1">Yes</option>
					            </select>
				            </div>
				        </div>

				        <div class="form-group row" id="return_trip" style="display:none">
				            <label for="return_trip" class="col-6 col-md-4 col-form-label">Does the student need a return trip?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="return_trip" name="return_trip">
					                <option value="0">No</option>
					                <option value="1">Yes</option>
					            </select>
				            </div>
				        </div>

				        <div class="form-group">
				        	<a href="{{ route('partner.index') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				        	<button class="btn btn-primary" type="submit" ">Save Information</button>
				        </div>
				        <div class="alert alert-error">
				        	<ul>
				        		@foreach ($errors->all() as $error)
				        			<li>{{ $error }}</li>
				        		@endforeach
				        	</ul>
				        </div>
				    </form>

				</div>
			<div class="col-sm-4">
					<h3>Tips</h3>
					<div class="list-group">

						<a href="" class="list-group-item list-group-item-action flex-column align-items-start">
					    	<p class="mb-1">Nunca é demais lembrar o peso e o significado destes problemas, uma vez que o julgamento imparcial das eventualidades não pode mais se dissociar do fluxo de informações.</p>
						</a>

						<a href="" class="list-group-item list-group-item-action flex-column align-items-start">
					    	<p class="mb-1">A nível organizacional, o novo modelo estrutural aqui preconizado promove a alavancagem dos métodos utilizados na avaliação de resultados.</p>
						</a>

						<a href="" class="list-group-item list-group-item-action flex-column align-items-start">
					    	<p class="mb-1">Por outro lado, a adoção de políticas descentralizadoras facilita a criação do fluxo de informações.</p>
						</a>

					</div>
				</div>
			</div>
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {

    	if($('#pickup').val == 1)
    	{
    		$('#return_trip').show();
    	}

        $('#pickup').change(function() {
            $('#return_trip').toggle();
        });

    });
</script>

@endsection