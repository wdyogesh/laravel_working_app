@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3></h3>

					<form class="form-group">

			        	<div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
				            <label for="title" class="col-6 col-md-4 col-form-label">Title</label>
				            <div class="col col-md-8">
				            	<input id="title" type="text" class="form-control" name="title" value="{{ old('title', Auth::user()->host->house->first()->title) }}" disabled>
				            </div>
				        </div>

			        	<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
				            <label for="first_name" class="col-6 col-md-4 col-form-label">First Name</label>
				            <div class="col col-md-8">
				            	<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('family_name') ? ' has-error' : '' }}">
				            <label for="family_name" class="col-6 col-md-4 col-form-label">Family Name</label>
				            <div class="col col-md-8">
				            	<input id="family_name" type="text" class="form-control" name="family_name" value="{{ old('family_name',Auth::user()->last_name) }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
				            <label for="mobile_number" class="col-6 col-md-4 col-form-label">Mobile Number</label>
				            <div class="col col-md-8">
				            	<input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', Auth::user()->host->first()->mobile_number) }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('occupation') ? ' has-error' : '' }}">
				            <label for="occupation" class="col-6 col-md-4 col-form-label">Occupation</label>
				            <div class="col col-md-8">
				            	<input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation',Auth::user()->host->first()->occupation) }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="gender" name="gender" disabled>
					            	@if (Auth::user()->host->first()->gender == 'Male')
						                <option value="Male" selected>Male</option>
						                <option value="Female">Female</option>
					                @else
						                <option value="Male">Male</option>
						                <option value="Female" selected>Female</option>
					                @endif
					            </select>
					        </div>
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{ old('date_birth',Auth::user()->host->first()->date_birth) }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country',Auth::user()->host->first()->country) }}" disabled>
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
				            			@if ($key == old("hear_about_us", Auth::user()->host->first()->hear_about_us))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
					            </select>
				            </div>
				        </div>

				        <div class="form-group">
				        	<a href="{{ action('HostController@edit') }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
				        	@if (Auth::user()->host->first()->host_type == 'homestay')
				            	<a href="{{ route('family.index') }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
				            @else
				            	<a href="{{ route('house.show',Auth::user()->host->first()->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
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