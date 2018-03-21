@extends('layouts.master')
	
@section('content')

	<div class="starter-template">

	    @include('layouts.header')
		
		@if(!session()->has('create_second_student'))
			<h1>Add Student</h1>
		@else
			<h1>Add Second Student</h1>
		@endif

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group" method="POST" action="{{ route('student.store') }}">
						{{ csrf_field() }}
						<input type="hidden" name="ver_student" value="">
						@if(!session()->has('create_second_student'))
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
						@endif
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name') }}" >
							</div>
						</div>

						<div class="form-group row{{ $errors->has('last_name') ? ' has-error' : '' }}">
						    <label for="last_name" class="col-6 col-md-4 col-form-label">Last name</label>
							<div class="col col-md-8">
								<input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" >
							</div>
						</div>

				        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
				            <label for="email" class="col-6 col-md-4 col-form-label">E-Mail address</label>
				            <div class="col col-md-8">
				            	<input id="email" type="text" class="form-control" name="email" placeholder="E-Mail address" value="{{ old('email') }}">
				            </div>
				        </div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="gender">Gender</label>
				        	<div class="col-md-8">
								<select class="form-control" id="gender" name="gender">
						            <option value="male">Male</option>
						            <option value="female">Female</option>
						        </select>
							</div>
						</div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('passport_number') ? ' has-error' : '' }}">
				            <label for="passport_number" class="col-6 col-md-4 col-form-label">Passport</label>
				            <div class="col col-md-8">
				            	<input id="passport_number" type="text" class="form-control" name="passport_number" placeholder="Passport" value="{{ old('passport_number') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('address') ? ' has-error' : '' }}">
				            <label for="address" class="col-6 col-md-4 col-form-label">Address</label>
				            <div class="col col-md-8">
				            	<input id="address" type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
				            <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of birth" value="{{ old('date_birth') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('english_level') ? ' has-error' : '' }}">
				            <label for="english_level" class="col-6 col-md-4 col-form-label">English level</label>
				            <div class="col col-md-8">
				            	<select class="form-control" id="english_level" name="english_level" placeholder="English level">
					                <option value="Basic">Basic</option>
					                <option value="Intermediate">Intermediate</option>
					                <option value="Advanced">Advanced</option>
					            </select>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('about_student') ? ' has-error' : '' }}">
				            <label for="about_student" class="col-6 col-md-4 col-form-label">About the student</label>
				            <div class="col col-md-8">
				            	<input id="about_student" type="text" class="form-control" name="about_student" placeholder="About the student" value="{{ old('about_student') }}" >
				            </div>
				        </div>

				        <h3>Other Info</h3>

				        <div class="form-group row{{ $errors->has('objec_pets') ? ' has-error' : '' }}" id="div_like_pets" name="objec_pets">
    						<label for="objec_pets" class="col-6 col-md-4 col-form-label">Do you have any objection to pets?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="objec_pets" name="objec_pets">
									<option value='1' selected> Yes </option>
								    <option value='0'> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('objec_pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('objec_pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('objec_under_10') ? ' has-error' : '' }}" id="div_objec_under_10" name="objec_under_10">
    						<label for="objec_under_10" class="col-6 col-md-4 col-form-label">Do you have any objection to kids under 10?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="objec_under_10" name="objec_under_10">
								    <option value='1' selected> Yes </option>
								    <option value='0'> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('objec_under_10'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('objec_under_10') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('any_medical_issue') ? ' has-error' : '' }}" id="div_any_medical_issue" name="any_medical_issue">
    						<label for="any_medical_issue" class="col-6 col-md-4 col-form-label">Any medical issue or need we should be aware of it?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="any_medical_issue" name="any_medical_issue">
								    <option value='0' selected> No </option>
								    <option value='1'> Yes </option>
	    						</select>
    						</div>
    						@if ($errors->has('any_medical_issue'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('any_medical_issue') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('medical_issue_desc') ? ' has-error' : '' }}" id="div_medical_issue" style="display:none">
				            <label for="medical_issue_desc" class="col-6 col-md-4 col-form-label">What kind of medical issue do you have?</label>
				            <div class="col col-md-8">
				            	<input id="medical_issue_desc" type="text" class="form-control" name="medical_issue_desc" placeholder="Medical Issue" value="{{ old('medical_issue_desc')}}">
				            </div>
				            @if ($errors->has('medical_issue_desc'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('medical_issue_desc') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('have_allergies') ? ' has-error' : '' }}" id="div_have_allergies" name="have_allergies">
    						<label for="have_allergies" class="col-6 col-md-4 col-form-label">Do you have any allergies?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="have_allergies" name="have_allergies">
								    <option value='0' selected> No </option>
								    <option value='1'> Yes </option>
	    						</select>
    						</div>
    						@if ($errors->has('have_allergies'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('have_allergies') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('allergy_desc') ? ' has-error' : '' }}" id="div_allergies" style="display:none">
				            <label for="allergy_desc" class="col-6 col-md-4 col-form-label">What kind of allergy do you have?</label>
				            <div class="col col-md-8">
				            	<input id="allergy_desc" type="text" class="form-control" name="allergy_desc" placeholder="Allergies" value="{{ old('allergy_desc')}}">
				            </div>
				            @if ($errors->has('allergy_desc'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('allergy_desc') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('any_dietary_request') ? ' has-error' : '' }}" id="div_any_dietary_request" name="any_dietary_request">
    						<label for="any_dietary_request" class="col-6 col-md-4 col-form-label">Any dietary request?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="any_dietary_request" name="any_dietary_request">
								    <option value='0' selected> No </option>
								    <option value='1'> Yes </option>
	    						</select>
    						</div>
    						@if ($errors->has('any_dietary_request'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('any_dietary_request') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('dietary_request') ? ' has-error' : '' }}" id="div_dietary_request" name="dietary_request" style="display:none">
    						<label for="dietary_request" class="col-6 col-md-4 col-form-label">Select the diets:</label>
    						<div class="col col-md-8">
								@foreach($features_diet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_dietary_request[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}">
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

						<div class="form-group row{{ $errors->has('any_special_needs') ? ' has-error' : '' }}" id="div_any_special_needs" name="any_special_needs">
    						<label for="any_special_needs" class="col-6 col-md-4 col-form-label">Any special needs?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="any_special_needs" name="any_special_needs">
								    <option value='0' selected> No </option>
								    <option value='1'> Yes </option>
	    						</select>
    						</div>
    						@if ($errors->has('any_special_needs'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('any_special_needs') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('special_needs_desc') ? ' has-error' : '' }}" id="div_special_needs" style="display:none">
				            <label for="special_needs_desc" class="col-6 col-md-4 col-form-label">What special needs do you have?</label>
				            <div class="col col-md-8">
				            	<input id="special_needs_desc" type="text" class="form-control" name="special_needs_desc" placeholder="Special needs" value="{{ old('special_needs_desc')}}">
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
								<select class="form-control" id="smoke" name="smoke">
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
												value="{{ old('feature', $feature->name) }}">{{$feature->friendly_name}}
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
												value="{{ old('feature', $feature->name) }}">{{$feature->friendly_name}}
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
												value="{{ old('feature', $feature->name) }}">{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_sports'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_sports') }}</strong>
				                </span>
				            @endif
						</div>

				        <h3>Emergency contact</h3>

				        <div class="form-group row{{ $errors->has('emergency_first_name') ? ' has-error' : '' }}">
				            <label for="emergency_first_name" class="col-6 col-md-4 col-form-label">First name</label>
				            <div class="col col-md-8">
				            	<input id="emergency_first_name" type="text" class="form-control" name="emergency_first_name" placeholder="First name" value="{{ old('emergency_first_name') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_last_name') ? ' has-error' : '' }}">
				            <label for="emergency_last_name" class="col-6 col-md-4 col-form-label">Last name</label>
				            <div class="col col-md-8">
				            	<input id="emergency_last_name" type="text" class="form-control" name="emergency_last_name" placeholder="Last name" value="{{ old('emergency_last_name') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_email') ? ' has-error' : '' }}">
				            <label for="emergency_email" class="col-6 col-md-4 col-form-label">E-Mail</label>
				            <div class="col col-md-8">
				            	<input id="emergency_email" type="text" class="form-control" name="emergency_email" placeholder="E-Mail" value="{{ old('emergency_email') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_phone_number') ? ' has-error' : '' }}">
				            <label for="emergency_phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="emergency_phone_number" type="text" class="form-control" name="emergency_phone_number" placeholder="Phone number" value="{{ old('emergency_phone_number') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_country') ? ' has-error' : '' }}">
				            <label for="emergency_country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="emergency_country" type="text" class="form-control" name="emergency_country" placeholder="Country" value="{{ old('emergency_country') }}" >
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('emergency_relationship') ? ' has-error' : '' }}" id="emergency_relationship" name="emergency_relationship">
    						<label for="emergency_relationship" class="col-6 col-md-4 col-form-label">Relationship</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="emergency_relationship" name="emergency_relationship">
								    <option value='wife'>Mother</option>
								    <option value='husband'>Father</option>
								    <option value='wife'>Wife</option>
								    <option value='husband'>Husband</option>
								    <option value='son'>Son</option>
								    <option value='daughter'>Daughter</option>
	    							<option value='brother'>Brother</option>
	    							<option value='sister'>Sister</option>
	    							<option value='brother'>Aunt</option>
	    							<option value='sister'>Uncle</option>
	    							<option value='other'>Friend</option>
	    							<option value='other'>Other</option>
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
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {

    	if($('#any_medical_issue').val == 1)
    	{
    		$('#div_medical_issue').show();
    	}

    	if($('#have_allergies').val == 1)
    	{
    		$('#div_allergies').show();
    	}

    	if($('#any_dietary_request').val == 1)
    	{
    		$('#div_dietary_request').show();
    	}

    	if($('#any_special_needs').val == 1)
    	{
    		$('#div_special_needs').show();
    	}

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