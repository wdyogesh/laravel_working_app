@extends('layouts.master')

@section('content')

    <div class="starter-template">

        
        @include('layouts.header')

		<h1>Student Profile</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Personal Information</h3>

					<form class="form-group">
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', $student->user->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
							
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ $student->user->first_name }}" disabled>
							</div>
						</div>

						<div class="form-group row{{ $errors->has('family_name') ? ' has-error' : '' }}">
						        <label for="last_name" class="col-6 col-md-4 col-form-label">Last name</label>
								<div class="col col-md-8">
									<input id="last_name" type="text" class="form-control" name="last_name" value="{{ $student->user->last_name }}" disabled>
								</div>
							</div>

				        <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
				            <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $student->phone_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('passport_number') ? ' has-error' : '' }}">
				            <label for="passport_number" class="col-6 col-md-4 col-form-label">Passport number</label>
				            <div class="col col-md-8">
				            	<input id="passport_number" type="text" class="form-control" name="passport_number" value="{{ $student->passport_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
				            	<input id="gender" type="text" class="form-control" name="gender" value="{{ $student->gender }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{ $student->date_birth }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ $student->country }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('address') ? ' has-error' : '' }}">
				            <label for="address" class="col-6 col-md-4 col-form-label">Address</label>
				            <div class="col col-md-8">
				            	<input id="address" type="text" class="form-control" name="address" value="{{ $student->address }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('english_level') ? ' has-error' : '' }}">
				            <label for="english_level" class="col-6 col-md-4 col-form-label">English Level</label>
				            <div class="col col-md-8">
				            	<input id="english_level" type="text" class="form-control" name="english_level" value="{{ $student->english_level }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('about_student') ? ' has-error' : '' }}">
				            <label for="about_student" class="col-6 col-md-4 col-form-label">About the student</label>
				            <div class="col col-md-8">
				            	<input id="about_student" type="text" class="form-control" name="about_student" value="{{ $student->about_student }}" disabled>
				            </div>
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

				            	<select class="form-control" id="objec_pets" name="objec_pets" disabled>
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

						<div class="form-group row{{ $errors->has('pets_objection') ? ' has-error' : '' }}" id="div_pets" name="div_pets" @if($student->objec_pets == 0) style="display:none" @endif>
    						<label for="pets_objection" class="col-6 col-md-4 col-form-label">Pets that you have objection:</label>
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
				            					disabled>
												{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('pets_objection'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('pets_objection') }}</strong>
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

				            	<select class="form-control" id="objec_kids" name="objec_kids" disabled>
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

				            	<select class="form-control" id="medical_issue" name="medical_issue" disabled>
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
				            	<input id="medical_issue_desc" type="text" class="form-control" name="medical_issue_desc" value="{{ old('medical_issue_desc', $student->medical_issue_desc)}}" disabled>
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

				            	<select class="form-control" id="allergy" name="allergy" disabled>
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
				            	<input id="allergy_desc" type="text" class="form-control" name="allergy_desc" value="{{ old('allergy_desc', $student->allergy_desc)}}" disabled>
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

				            	<select class="form-control" id="dietary_request" name="dietary_request" disabled>
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

						<div class="form-group row{{ $errors->has('dietary_request') ? ' has-error' : '' }}" id="div_dietary_request" name="dietary_request" @if($student->dietary_request == 0) style="display:none" @endif>
    						<label for="dietary_request" class="col-6 col-md-4 col-form-label">Select the diets:</label>
    						<div class="col col-md-8">
								@foreach($features_diet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_dietary_request[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}" 
												@if ($student->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
				            					disabled>
												{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('dietary_request'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('dietary_request') }}</strong>
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

				            	<select class="form-control" id="special_needs" name="special_needs" disabled>
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
				            	<input id="special_needs_desc" type="text" class="form-control" name="special_needs_desc" value="{{ old('special_needs_desc', $student->special_needs_desc )}}" disabled>
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
								<select class="form-control" id="smoke" name="smoke" disabled>
								    <option value='0' selected > No </option>
								    <option value='1'> Yes </option>
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
				            					disabled>{{$feature->friendly_name}}
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
				            					disabled>{{$feature->friendly_name}}
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
				            					disabled>{{$feature->friendly_name}}
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
				            	<input id="emergency_first_name" type="text" class="form-control" name="emergency_first_name" value="{{ $student->emergency_first_name }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_last_name') ? ' has-error' : '' }}">
				            <label for="emergency_last_name" class="col-6 col-md-4 col-form-label">Last name</label>
				            <div class="col col-md-8">
				            	<input id="emergency_last_name" type="text" class="form-control" name="emergency_last_name" value="{{ $student->emergency_last_name }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_email') ? ' has-error' : '' }}">
				            <label for="emergency_email" class="col-6 col-md-4 col-form-label">E-Mail</label>
				            <div class="col col-md-8">
				            	<input id="emergency_email" type="text" class="form-control" name="emergency_email" value="{{ $student->emergency_email }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_phone_number') ? ' has-error' : '' }}">
				            <label for="emergency_phone_number" class="col-6 col-md-4 col-form-label">Mobile Phone</label>
				            <div class="col col-md-8">
				            	<input id="emergency_phone_number" type="text" class="form-control" name="emergency_phone_number" value="{{ $student->emergency_phone_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_country') ? ' has-error' : '' }}">
				            <label for="emergency_country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="emergency_country" type="text" class="form-control" name="emergency_country" value="{{ $student->emergency_country }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_relationship') ? ' has-error' : '' }}">
				            <label for="emergency_relationship" class="col-6 col-md-4 col-form-label">Relationship</label>
				            <div class="col col-md-8">
				            	<input id="emergency_relationship" type="text" class="form-control" name="emergency_relationship" value="{{ $student->emergency_relationship }}" disabled>
				            </div>
				        </div>

				        <div class="form-group">
				            @if(Auth::user()->isAdmin())
				            	<a href="{{ route('admin.student.edit', $student->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Student Information</a>
				            @elseif(Auth::user()->isPartner())
				            	<a href="{{ route('partner.student.edit', $student->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Student Information</a>
				            @endif
				            
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

@endsection