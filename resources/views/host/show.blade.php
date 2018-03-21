@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Personal Information</h3>

					<form class="form-group">
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', $host->user->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
						@if(Auth::user()->isAdmin())
							<div class="form-group row{{ $errors->has('status') ? ' has-error' : '' }}">
								<label for="status" class="col-6 col-md-4 col-form-label">Status</label>
								<div class="col col-md-8">
									<input id="status" type="text" class="form-control" name="status" value="{{ $host->status }}" disabled>
								</div>
							</div>
						@endif

						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First Name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ $host->user->first_name }}" disabled>
							</div>
						</div>

						<div class="form-group row{{ $errors->has('family_name') ? ' has-error' : '' }}">
						        <label for="family_name" class="col-6 col-md-4 col-form-label">Family Name</label>
								<div class="col col-md-8">
									<input id="family_name" type="text" class="form-control" name="family_name" value="{{ $host->user->last_name }}" disabled>
								</div>
							</div>

				        <div class="form-group row{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
				            <label for="mobile_number" class="col-6 col-md-4 col-form-label">Mobile Number</label>
				            <div class="col col-md-8">
				            	<input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{  $host->mobile_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('occupation') ? ' has-error' : '' }}">
				            <label for="occupation" class="col-6 col-md-4 col-form-label">Occupation</label>
				            <div class="col col-md-8">
				            	<input id="occupation" type="text" class="form-control" name="occupation" value="{{ $host->occupation }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="gender" name="gender" disabled>
									@if ($host->gender == 'Male')
										<option value="Male" selected>Male</option>
					                @else
						                <option value="Female" selected>Female</option>
					                @endif
					            </select>
					        </div>
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{  $host->date_birth }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ $host->country }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('hear_about_us') ? ' has-error' : '' }}">
				            <label for="hear_about_us" class="col-6 col-md-4 col-form-label">How did you hear about us?</label>
				            <div class="col col-md-8">
				            	@php 
				            	$options = [
				            		"WordofMouth" => "Word of Mouth",
				            		"HostEvening" => "Host Evening",
				            		"Flyer" => "Flyer",
				            		"Facebook" => "Facebook",
				            		"Twitter" => "Twitter",
				            		"Google" => "Google",
				            		"NewspaperMagazine" => "Newspaper/Magazine",
				            		"Event" => "Event",
				            		"Other" => "Other"
				            	]
				            	@endphp

				            	<select class="form-control" id="hear_about_us" name="hear_about_us" disabled>
					                @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("hear_about_us", $host->hear_about_us))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				        </div>

				        <h3>Other informations</h3>

				        <div class="form-group row{{ $errors->has('welcome') ? ' has-error' : '' }}" id="welcome" name="welcome">
    						<label for="welcome" class="col-6 col-md-4 col-form-label">Family Welcomes</label>
    						<div class="col col-md-8">
	    						@foreach($features_welcomes as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_welcome[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
													checked
												@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_welcome'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_welcome') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('hosted_students_before') ? ' has-error' : '' }}">
    						<label for="hosted_students_before" class="col-6 col-md-4 col-form-label">Have you ever hosted student before?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="hosted_students_before" name="hosted_students_before"  disabled>
				            			<option value='1'
				            			@if ($host->hosted_students_before == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            			<option value='0'
				            			@if ($host->hosted_students_before == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('hosted_students_before'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('hosted_students_before') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('since_when') ? ' has-error' : '' }}" id="div_year"
						@if($host->hosted_students_before == 0)
							style="display:none"
						@endif >
				            <label for="since_when" class="col-6 col-md-4 col-form-label">Since when?</label>
				            <div class="col col-md-8">
				            	<input id="since_when" type="text" class="form-control" name="since_when" placeholder="Year" value="{{ old('since_when', $host->since_when) }}" disabled>
				            </div>
				            @if ($errors->has('since_when'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('since_when') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('can_students_smoke') ? ' has-error' : '' }}" id="div_can_students_smoke" name="can_students_smoke">
    						<label for="can_students_smoke" class="col-6 col-md-4 col-form-label">Can students smoke in your homestay?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="can_students_smoke" name="can_students_smoke" disabled>
								    <option value='1'
				            			@if ($host->can_students_smoke == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->can_students_smoke == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('can_students_smoke'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('can_students_smoke') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('smoking_where') ? ' has-error' : '' }}" id="div_smoking_where" name="smoking_where" 
						@if($host->can_students_smoke == 0)
							style="display:none"
						@endif >
    						<label for="smoking_where" class="col-6 col-md-4 col-form-label">In which area?</label>
    						<div class="col col-md-8">
								@foreach($features_smoking as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_smoking[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('smoking_where'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('smoking_where') }}</strong>
				                </span>
				            @endif
						</div>

					
						<div class="form-group row{{ $errors->has('have_pets') ? ' has-error' : '' }}" id="div_have_pets" name="have_pets">
    						<label for="have_pets" class="col-6 col-md-4 col-form-label">Do you have pets?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="have_pets" name="have_pets" disabled>
								    <option value='1'
				            			@if ($host->have_pets == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->have_pets == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('have_pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('have_pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('pets') ? ' has-error' : '' }}" id="div_pets" name="pets"
						@if($host->have_pets == 0)
							style="display:none"
						@endif >
    						<label for="pets" class="col-6 col-md-4 col-form-label">Select type of pets:</label>
    						<div class="col col-md-8">
								@foreach($features_pet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_pet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('special_dietarian') ? ' has-error' : '' }}" id="div_special_dietarian" name="special_dietarian">
    						<label for="special_dietarian" class="col-6 col-md-4 col-form-label">Any Special Diets?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="special_dietarian" name="special_dietarian" disabled>
								    <option value='1'
				            			@if ($host->special_dietarian == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->special_dietarian == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('special_dietarian'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('special_dietarian') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('diets') ? ' has-error' : '' }}" id="div_diets" name="diets"
						@if($host->special_dietarian == 0)
							style="display:none"
						@endif >
    						<label for="diets" class="col-6 col-md-4 col-form-label">Diet Type available on request</label>
    						<div class="col col-md-8">
	    						@foreach($features_diet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_diet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('diets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('diets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('diets') ? ' has-error' : '' }}" id="diets" name="diets">
    						<label for="diets" class="col-6 col-md-4 col-form-label">Select Art Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_art as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_art[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('diets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('diets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('diets') ? ' has-error' : '' }}" id="diets" name="diets">
    						<label for="diets" class="col-6 col-md-4 col-form-label">Select Lifestyle Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_lifestyle as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_lifestyle[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('diets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('diets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('diets') ? ' has-error' : '' }}" id="diets" name="diets">
    						<label for="diets" class="col-6 col-md-4 col-form-label">Select Sport Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_sports as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_sports[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												disabled>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('diets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('diets') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group">
				        	@if(Auth::user()->isHost())
				        		<a href="{{ action('HostController@edit', $host->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
				        		@if($host->profile_completed == 0)
						        	@if($host->host_type == 'homestay')
						            	<a href="{{ route('family.index') }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
						            @else
						            	<a href="{{ route('house.index') }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
						            @endif
						        @endif
					        @elseif(Auth::user()->isAdmin())

					        	<a href="{{ route('admin.host.edit', $host->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
					        @elseif(Auth::user()->isStudent())

					        @elseif(Auth::user()->isPartner())

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