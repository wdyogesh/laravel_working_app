@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<h1>Edit Student Information</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Personal Information</h3>

					<form class="form-group" method="POST" action="{{ route('student.update', $student->user_id) }}" enctype="multipart/form-data">

			        	{{ csrf_field() }}
			        	<input type="hidden" name="_method" value="put">

						<div class="form-group row">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', $student->user->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
							
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ $student->user->first_name }}">
							</div>
							@if ($errors->has('first_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('first_name') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('last_name') ? ' has-error' : '' }}">
						        <label for="last_name" class="col-6 col-md-4 col-form-label">Last name</label>
								<div class="col col-md-8">
									<input id="last_name" type="text" class="form-control" name="last_name" value="{{ $student->user->last_name }}">
								</div>
								@if ($errors->has('last_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('last_name') }}</strong>
				                </span>
				            @endif
							</div>

				        <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
				            <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $student->phone_number }}">
				            </div>
				            @if ($errors->has('phone_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('phone_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('passport_number') ? ' has-error' : '' }}">
				            <label for="passport_number" class="col-6 col-md-4 col-form-label">Passport number</label>
				            <div class="col col-md-8">
				            	<input id="passport_number" type="text" class="form-control" name="passport_number" value="{{ $student->passport_number }}">
				            </div>
				            @if ($errors->has('passport_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('passport_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"Male" => "Male",
				            		"Female" => "Female"
				            	]
				            	@endphp

				            	<select class="form-control" id="gender" name="gender">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("gender", $student->gender))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				            @if ($errors->has('gender'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('gender') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{ $student->date_birth }}">
				            </div>
				            @if ($errors->has('date_birth'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('date_birth') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ $student->country }}">
				            </div>
				            @if ($errors->has('country'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('country') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('address') ? ' has-error' : '' }}">
				            <label for="address" class="col-6 col-md-4 col-form-label">Address</label>
				            <div class="col col-md-8">
				            	<input id="address" type="text" class="form-control" name="address" value="{{ $student->address }}">
				            </div>
				            @if ($errors->has('address'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('address') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('english_level') ? ' has-error' : '' }}">
				            <label for="english_level" class="col-6 col-md-4 col-form-label">English level</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"Basic" => "Basic",
				            		"Intermediate" => "Intermediate",
				            		"Advanced" => "Advanced"
				            	]
				            	@endphp

				            	<select class="form-control" id="english_level" name="english_level">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("english_level", $student->english_level))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				            @if ($errors->has('english_level'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('english_level') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('about_student') ? ' has-error' : '' }}">
				            <label for="about_student" class="col-6 col-md-4 col-form-label">About the student</label>
				            <div class="col col-md-8">
				            	<input id="about_student" type="text" class="form-control" name="about_student" value="{{ $student->about_student }}">
				            </div>
				            @if ($errors->has('about_student'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('about_student') }}</strong>
				                </span>
				            @endif
				        </div>

				        <h3>Other Info</h3>

				        <div class="form-group row{{ $errors->has('objec_pets') ? ' has-error' : '' }}" id="div_like_pets" name="objec_pets">
    						<label for="objec_pets" class="col-6 col-md-4 col-form-label">Do you have any objection to pets?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="objec_pets" name="objec_pets">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("objec_pets", $student->objec_pets))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>

				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('objec_pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('objec_pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_pet') ? ' has-error' : '' }}" id="div_pets" name="div_pets" @if($student->objec_pets == 0) style="display:none" @endif>
    						<label for="features_pet" class="col-6 col-md-4 col-form-label">Select the pets you have objection:</label>
    						<div class="col col-md-8">
								@foreach($features_pets as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_pet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					>
												{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_pet'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_pet') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('objec_kids') ? ' has-error' : '' }}" id="div_objec_under_10" name="objec_kids">
    						<label for="objec_kids" class="col-6 col-md-4 col-form-label">Do you have any objection to kids under 10?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="objec_kids" name="objec_kids">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("objec_kids", $student->objec_kids))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('objec_kids'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('objec_kids') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('medical_issue') ? ' has-error' : '' }}" id="div_any_medical_issue" name="medical_issue">
    						<label for="medical_issue" class="col-6 col-md-4 col-form-label">Any medical issue or need we should be aware of it?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="medical_issue" name="medical_issue">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("medical_issue", $student->medical_issue))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('medical_issue'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('medical_issue') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('medical_issue_desc') ? ' has-error' : '' }}" id="div_medical_issue" @if($student->medical_issue == 0) style="display:none" @endif >
				            <label for="medical_issue_desc" class="col-6 col-md-4 col-form-label">What kind of medical issue do you have?</label>
				            <div class="col col-md-8">
				            	<input id="medical_issue_desc" type="text" class="form-control" name="medical_issue_desc" placeholder="Medical Issue" value="{{ old('medical_issue_desc', $student->medical_issue_desc)}}">
				            </div>
				            @if ($errors->has('medical_issue_desc'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('medical_issue_desc') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('allergy') ? ' has-error' : '' }}" id="div_have_allergies" name="allergy">
    						<label for="allergy" class="col-6 col-md-4 col-form-label">Do you have any allergies?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="allergy" name="allergy">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("allergy", $student->allergy))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('allergy'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('allergy') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('allergy_desc') ? ' has-error' : '' }}" id="div_allergies" @if($student->allergy == 0) style="display:none" @endif>
				            <label for="allergy_desc" class="col-6 col-md-4 col-form-label">What kind of allergy do you have?</label>
				            <div class="col col-md-8">
				            	<input id="allergy_desc" type="text" class="form-control" name="allergy_desc" placeholder="Allergies" value="{{ old('allergy_desc', $student->allergy_desc)}}">
				            </div>
				            @if ($errors->has('allergy_desc'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('allergy_desc') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('dietary_request') ? ' has-error' : '' }}" id="div_any_dietary_request" name="dietary_request">
    						<label for="dietary_request" class="col-6 col-md-4 col-form-label">Any dietary request?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="dietary_request" name="dietary_request">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("dietary_request", $student->dietary_request))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('dietary_request'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('dietary_request') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('diets') ? ' has-error' : '' }}" id="div_dietary_request" name="diets" @if($student->dietary_request == 0) style="display:none" @endif>
    						<label for="diets" class="col-6 col-md-4 col-form-label">Select the diets:</label>
    						<div class="col col-md-8">
								@foreach($features_diet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_diet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					>
												{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('diets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('diets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('special_needs') ? ' has-error' : '' }}" id="special_needs" name="special_needs">
    						<label for="special_needs" class="col-6 col-md-4 col-form-label">Any special needs?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="special_needs" name="special_needs">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("special_needs", $student->special_needs))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('special_needs'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('special_needs') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('special_needs_desc') ? ' has-error' : '' }}" id="div_special_needs" @if($student->special_needs == 0) style="display:none" @endif>
				            <label for="special_needs_desc" class="col-6 col-md-4 col-form-label">What special needs do you have?</label>
				            <div class="col col-md-8">
				            	<input id="special_needs_desc" type="text" class="form-control" name="special_needs_desc" placeholder="Special needs" value="{{ old('special_needs_desc', $student->special_needs_desc)}}">
				            </div>
				            @if ($errors->has('special_needs_desc'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('special_needs_desc') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('smoke') ? ' has-error' : '' }}" id="div_smoke" name="smoke">
    						<label for="smoke" class="col-6 col-md-4 col-form-label">Do you smoke?</label>
    						<div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"1" => "Yes",
				            		"0" => "No"
				            	]
				            	@endphp

				            	<select class="form-control" id="smoke" name="smoke">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("smoke", $student->smoke))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
    						@if ($errors->has('smoke'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('smoke') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_art') ? ' has-error' : '' }}" id="features_hobby_art" name="features_hobby_art">
    						<label for="features_hobby_art" class="col-6 col-md-4 col-form-label">Select Art Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_art as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_art[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}" 
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_art'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_art') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_lifestyle') ? ' has-error' : '' }}" id="features_hobby_lifestyle" name="features_hobby_lifestyle">
    						<label for="features_hobby_lifestyle" class="col-6 col-md-4 col-form-label">Select Lifestyle Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_lifestyle as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_lifestyle[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}" 
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_lifestyle'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_lifestyle') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_sports') ? ' has-error' : '' }}" id="features_hobby_sports" name="features_hobby_sports">
    						<label for="features_hobby_sports" class="col-6 col-md-4 col-form-label">Select Sport Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_sports as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_sports[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}" 
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_sports'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_sports') }}</strong>
				                </span>
				            @endif
						</div>

				       <h3>Emergency Information</h3> 

				        <div class="form-group row{{ $errors->has('emergency_first_name') ? ' has-error' : '' }}">
				            <label for="emergency_first_name" class="col-6 col-md-4 col-form-label">First name</label>
				            <div class="col col-md-8">
				            	<input id="emergency_first_name" type="text" class="form-control" name="emergency_first_name" value="{{ $student->emergency_first_name }}">
				            </div>
				            @if ($errors->has('emergency_first_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_first_name') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_last_name') ? ' has-error' : '' }}">
				            <label for="emergency_last_name" class="col-6 col-md-4 col-form-label">Last name</label>
				            <div class="col col-md-8">
				            	<input id="emergency_last_name" type="text" class="form-control" name="emergency_last_name" value="{{ $student->emergency_last_name }}">
				            </div>
				            @if ($errors->has('emergency_last_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_last_name') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_email') ? ' has-error' : '' }}">
				            <label for="emergency_email" class="col-6 col-md-4 col-form-label">E-Mail</label>
				            <div class="col col-md-8">
				            	<input id="emergency_email" type="text" class="form-control" name="emergency_email" value="{{ $student->emergency_email }}">
				            </div>
				            @if ($errors->has('emergency_email'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_email') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_phone_number') ? ' has-error' : '' }}">
				            <label for="emergency_phone_number" class="col-6 col-md-4 col-form-label">Mobile Phone</label>
				            <div class="col col-md-8">
				            	<input id="emergency_phone_number" type="text" class="form-control" name="emergency_phone_number" value="{{ $student->emergency_phone_number }}">
				            </div>
				            @if ($errors->has('emergency_phone_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_phone_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_country') ? ' has-error' : '' }}">
				            <label for="emergency_country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="emergency_country" type="text" class="form-control" name="emergency_country" value="{{ $student->emergency_country }}">
				            </div>
				            @if ($errors->has('emergency_country'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_country') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_relationship') ? ' has-error' : '' }}">
				            <label for="emergency_relationship" class="col-6 col-md-4 col-form-label">Relationship</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"Mother" => "Mother",
				            		"Father" => "Father",
				            		"Wife" => "Wife",
				            		"Husband" => "Husband",
				            		"Son" => "Son",
				            		"Daughter" => "Daughter",
				            		"Brother" => "Brother",
				            		"Sister" => "Sister",
				            		"Aunt" => "Aunt",
				            		"Uncle" => "Uncle",
				            		"Friend" => "Friend"
				            	]
				            	@endphp

				            	<select class="form-control" id="emergency_relationship" name="emergency_relationship">
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("emergency_relationship", $student->emergency_relationship))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				            @if ($errors->has('emergency_relationship'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('emergency_relationship') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group">
				        	<a href="{{ route('homepage') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				        	<button class="btn btn-primary" type="submit" ">Save Information</button>
				            
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
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        $('#objec_pets').change(function() {
            $('#div_pets').toggle();
        });

        $('#any_medical_issue').change(function() {
            $('#div_medical_issue').toggle();
        });

        $('#have_allergies').change(function() {
            $('#div_allergies').toggle();
        });

		$('#any_dietary_request').change(function() {
            $('#div_dietary_request').toggle();
        });

        $('#any_special_needs').change(function() {
            $('#div_special_needs').toggle();
        });
    });
</script>

@endsection