@extends('layouts.master')

@section('content')

    <div class="starter-template">
        @include('layouts.header')

		<h1>Booking Information</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group">
						
						<h3>Preferred location</h3>
						<div class="form-group row{{ $errors->has('city') ? ' has-error' : '' }}">
				            <label for="city" class="col-6 col-md-4 col-form-label">City</label>
				            <div class="col col-md-8">
				            	<input id="city" type="text" class="form-control" name="city" value="{{ $booking->city }}" disabled>
				            </div>
				        </div>

						<div class="form-group row{{ $errors->has('school_name') ? ' has-error' : '' }}">
						    <label for="school_name" class="col-6 col-md-4 col-form-label">School name</label>
							<div class="col col-md-8">
								<input id="school_name" type="text" class="form-control" name="school_name" value="{{ $booking->school_name }}" disabled>
							</div>
						</div>

				        <div class="form-group row{{ $errors->has('school_address') ? ' has-error' : '' }}">
				            <label for="school_address" class="col-6 col-md-4 col-form-label">School Address</label>
				            <div class="col col-md-8">
				            	<input id="school_address" type="text" class="form-control" name="school_address" value="{{ $booking->school_address }}" disabled>
				            </div>
				        </div>

				        <h3>Stay Duration</h3>

				        <div class="form-group row{{ $errors->has('checkin') ? ' has-error' : '' }}">
				            <label for="checkin" class="col-6 col-md-4 col-form-label">Check-in</label>
				            <div class="col col-md-8">
				            	<input id="checkin" type="date" class="form-control" name="checkin" value="{{ $booking->checkin }}" disabled>
				            </div>
				        </div>

						<div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="checkout">Check-out</label>
				        	<div class="col-md-8">
								<input id="checkout" type="date" class="form-control" name="checkout" value="{{ $booking->checkout }}" disabled>
							</div>
						</div>

						<h3>Flight Information</h3>

						<div class="form-group row{{ $errors->has('arrival_date') ? ' has-error' : '' }}">
				            <label for="arrival_date" class="col-6 col-md-4 col-form-label">Arrival date</label>
				            <div class="col col-md-8">
				            	<input id="arrival_date" type="date" class="form-control" name="arrival_date" value="{{ $booking->arrival_date }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('arrival_time') ? ' has-error' : '' }}">
				            <label for="arrival_time" class="col-6 col-md-4 col-form-label">Arrival time</label>
				            <div class="col col-md-8">
				            	<input id="arrival_time" type="text" class="form-control" name="arrival_time" value="{{ $booking->arrival_time }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('flight_number') ? ' has-error' : '' }}">
				            <label for="flight_number" class="col-6 col-md-4 col-form-label">Flight number</label>
				            <div class="col col-md-8">
				            	<input id="flight_number" type="text" class="form-control" name="flight_number" value="{{ $booking->flight_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airline_company') ? ' has-error' : '' }}">
				            <label for="airline_company" class="col-6 col-md-4 col-form-label">Airline Company</label>
				            <div class="col col-md-8">
				            	<input id="airline_company" type="text" class="form-control" name="airline_company" value="{{ $booking->airline_company }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('airport') ? ' has-error' : '' }}">
				            <label for="airport" class="col-6 col-md-4 col-form-label">Airport</label>
				            <div class="col col-md-8">
				            	<input id="airport" type="text" class="form-control" name="airport" value="{{ $booking->airport }}" disabled>
				            </div>
				        </div>

				        <h3>Pick-up Information</h3>

				        <div class="form-group row">
				            <label for="pickup" class="col-6 col-md-4 col-form-label">Does the student need pick-up service?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="pickup" name="pickup" disabled>
					            	@if($booking->pickup)
					            		<option value="1">Yes</option>
					            	@else
					                	<option value="0">No</option>
					                @endif
					            </select>
				            </div>
				        </div>

				        <div class="form-group row" id="return_trip" @if($booking->pickup == 0) style="display:none" @endif>
				            <label for="return_trip" class="col-6 col-md-4 col-form-label">Does the student need a return trip?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="return_trip" name="return_trip" disabled>
					                @if($booking->return_trip)
					            		<option value="1">Yes</option>
					            	@else
					                	<option value="0">No</option>
					                @endif
					            </select>
				            </div>
				        </div>

				        <div class="form-group">
				        	<a href="{{ route('admin.booking') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				        	<a href="{{ route('admin.booking.edit', $booking->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Booking Information</a>
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

@endsection