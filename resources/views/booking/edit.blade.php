@extends('layouts.master')

@section('content')

    <div class="starter-template">
        @include('layouts.header')

		<h1>Booking Information</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group" method="POST" action="{{ route('partner.booking.update', $booking->id) }}" enctype="multipart/form-data">

			        	{{ csrf_field() }}
			        	<input type="hidden" name="_method" value="put">
						
						<h3>Preferred location</h3>
						<div class="form-group row{{ $errors->has('city') ? ' has-error' : '' }}">
				            <label for="city" class="col-6 col-md-4 col-form-label">City</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"Brisbane" => "Brisbane",
				            		"Gold Coast" => "Gold Coast",
				            		"Melbourne" => "Melbourne",
				            		"Sydney" => "Sydney"
				            	]
				            	@endphp

				            	<select class="form-control" id="city" name="city">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("city") || $key == $booking->city)
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
								<input id="school_name" type="text" class="form-control" name="school_name" value="{{  old('school_name', $booking->school_name) }}">
							</div>
							@if ($errors->has('school_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('school_name') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group row{{ $errors->has('school_address') ? ' has-error' : '' }}">
				            <label for="school_address" class="col-6 col-md-4 col-form-label">School Address</label>
				            <div class="col col-md-8">
				            	<input id="school_address" type="text" class="form-control" name="school_address" value="{{ old('school_address', $booking->school_address) }}">
				            </div>
				            @if ($errors->has('school_address'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('school_address') }}</strong>
				                </span>
				            @endif
				        </div>

				        <h3>Stay Duration</h3>

				        <div class="form-group row{{ $errors->has('checkin') ? ' has-error' : '' }}">
				            <label for="checkin" class="col-6 col-md-4 col-form-label">Check-in</label>
				            <div class="col col-md-8">
				            	<input id="checkin" type="date" class="form-control" name="checkin" value="{{  old('checkin', $booking->checkin) }}">
				            </div>
				            @if ($errors->has('checkin'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('checkin') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('checkout') ? ' has-error' : '' }}">
				        	<label class="col-6 col-md-4 col-form-label" for="checkout">Check-out</label>
				        	<div class="col-md-8">
								<input id="checkout" type="date" class="form-control" name="checkout" value="{{  old('checkout', $booking->checkout) }}">
							</div>
							@if ($errors->has('checkout'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('checkout') }}</strong>
				                </span>
				            @endif
						</div>

						<h3>Flight Information</h3>

						<div class="form-group row{{ $errors->has('arrival_date') ? ' has-error' : '' }}">
				            <label for="arrival_date" class="col-6 col-md-4 col-form-label">Arrival date</label>
				            <div class="col col-md-8">
				            	<input id="arrival_date" type="date" class="form-control" name="arrival_date" value="{{  old('arrival_date', $booking->arrival_date) }}">
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('arrival_time') ? ' has-error' : '' }}">
				            <label for="arrival_time" class="col-6 col-md-4 col-form-label">Arrival time</label>
				            <div class="col col-md-8">
				            	<input id="arrival_time" type="text" class="form-control" name="arrival_time" value="{{  old('arrival_time', $booking->arrival_time) }}">
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('flight_number') ? ' has-error' : '' }}">
				            <label for="flight_number" class="col-6 col-md-4 col-form-label">Flight number</label>
				            <div class="col col-md-8">
				            	<input id="flight_number" type="text" class="form-control" name="flight_number" value="{{  old('flight_number', $booking->flight_number) }}">
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airline_company') ? ' has-error' : '' }}">
				            <label for="airline_company" class="col-6 col-md-4 col-form-label">Airline Company</label>
				            <div class="col col-md-8">
				            	<input id="airline_company" type="text" class="form-control" name="airline_company" value="{{  old('airline_company', $booking->airline_company) }}">
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airport') ? ' has-error' : '' }}">
				            <label for="airport" class="col-6 col-md-4 col-form-label">Airport</label>
				            <div class="col col-md-8">
				            	<input id="airport" type="text" class="form-control" name="airport" value="{{  old('airport', $booking->airport) }}">
				            </div>
				        </div>

				        <h3>Pick-up Information</h3>

				        <div class="form-group row">
				            <label for="pickup" class="col-6 col-md-4 col-form-label">Does the student need pick-up service?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="pickup" name="pickup">
					            	@if($booking->pickup)
					            		<option value="0">No</option>
					            		<option value="1" selected>Yes</option>
					            	@else
					                	<option value="0" selected>No</option>
					                	<option value="1">Yes</option>
					                @endif
					            </select>
				            </div>
				        </div>

				        <div class="form-group row" id="return_trip" @if($booking->pickup == 0) style="display:none" @endif>
				            <label for="return_trip" class="col-6 col-md-4 col-form-label">Does the student need a return trip?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="return_trip" name="return_trip">
					                @if($booking->return_trip)
					            		<option value="0">No</option>
					            		<option value="1" selected>Yes</option>
					            	@else
					                	<option value="0" selected>No</option>
					                	<option value="1">Yes</option>
					                @endif
					            </select>
				            </div>
				        </div>

				        <div class="form-group">
				        	@if(Auth::user()->isAdmin())
					        	<a href="{{ route('admin.booking') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				        		<button class="btn btn-primary" type="submit" ">Save Booking Information</button>
					        @elseif(Auth::user()->isPartner())
					        	<a href="{{ route('partner.booking') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				        		<button class="btn btn-primary" type="submit" ">Save Booking Information</button>
					        @endif
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