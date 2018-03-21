@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group">
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', $partner->user->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
							
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ $partner->user->first_name }}" disabled>
							</div>
						</div>

						<div class="form-group row{{ $errors->has('last_name') ? ' has-error' : '' }}">
						        <label for="last_name" class="col-6 col-md-4 col-form-label">Last name</label>
								<div class="col col-md-8">
									<input id="last_name" type="text" class="form-control" name="last_name" value="{{ $partner->user->last_name }}" disabled>
								</div>
							</div>

				        <div class="form-group row{{ $errors->has('business_name') ? ' has-error' : '' }}">
				            <label for="business_name" class="col-6 col-md-4 col-form-label">Business name</label>
				            <div class="col col-md-8">
				            	<input id="business_name" type="text" class="form-control" name="business_name" value="{{ $partner->business_name }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('type') ? ' has-error' : '' }}">
				            <label for="type" class="col-6 col-md-4 col-form-label">Type</label>
				            <div class="col col-md-8">
				            	<input id="type" type="text" class="form-control" name="type" 
				            	@if($partner->type == "student_agency")
				            		value = "Student agency"
				            	@else
				            		value = "Education provider"
				            	@endif
				            	disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('business_registration_number') ? ' has-error' : '' }}">
				            <label for="business_registration_number" class="col-6 col-md-4 col-form-label">Business registration number</label>
				            <div class="col col-md-8">
				            	<input id="business_registration_number" type="text" class="form-control" name="business_registration_number" value="{{ $partner->business_registration_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">
				            <label for="website" class="col-6 col-md-4 col-form-label">Website</label>
				            <div class="col col-md-8">
				            	<input id="website" type="text" class="form-control" name="website" value="{{ $partner->website }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
				            <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $partner->phone_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" value="{{ $partner->country }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('address') ? ' has-error' : '' }}">
				            <label for="address" class="col-6 col-md-4 col-form-label">Address</label>
				            <div class="col col-md-8">
				            	<input id="address" type="text" class="form-control" name="address" value="{{ $partner->address }}" disabled>
				            </div>
				        </div>

				        <div class="form-group">
				        	@if(Auth::user()->isHost())
					        @elseif(Auth::user()->isAdmin())
				        		<a href="{{ route('partner.edit', $partner->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
					        @elseif(Auth::user()->isStudent())
					        @elseif(Auth::user()->isPartner())
				        		<a href="{{ route('partner.edit', $partner->user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
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