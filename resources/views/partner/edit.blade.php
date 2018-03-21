@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<h1>Partner Information</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<form class="form-group" method="POST" action="{{ route('partner.update', $partner->user_id) }}">
						{{ csrf_field() }}
			        	<input type="hidden" name="_method" value="put">

						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', $partner->user->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
							
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name', $partner->user->first_name) }}" required>
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
									<input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', $partner->user->last_name) }}" required>
								</div>
								@if ($errors->has('last_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('last_name') }}</strong>
				                </span>
				            @endif
							</div>

				        <div class="form-group row{{ $errors->has('business_name') ? ' has-error' : '' }}">
				            <label for="business_name" class="col-6 col-md-4 col-form-label">Business name</label>
				            <div class="col col-md-8">
				            	<input id="business_name" type="text" class="form-control" name="business_name" placeholder="Business name" value="{{ old('business_name', $partner->business_name) }}" required>
				            </div>
				            @if ($errors->has('business_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('business_name') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('business_registration_number') ? ' has-error' : '' }}">
				            <label for="business_registration_number" class="col-6 col-md-4 col-form-label">Business registration number</label>
				            <div class="col col-md-8">
				            	<input id="business_registration_number" type="text" class="form-control" name="business_registration_number" placeholder="Business registration number" value="{{ old('business_registration_number', $partner->business_registration_number) }}" required>
				            </div>
				            @if ($errors->has('business_registration_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('business_registration_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">
				            <label for="website" class="col-6 col-md-4 col-form-label">Website</label>
				            <div class="col col-md-8">
				            	<input id="website" type="text" class="form-control" name="website" placeholder="Website" value="{{ old('website', $partner->website) }}" required>
				            </div>
				            @if ($errors->has('website'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('website') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
				            <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
				            <div class="col col-md-8">
				            	<input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number',$partner->phone_number) }}" required>
				            </div>
				            @if ($errors->has('phone_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('phone_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
				            <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
				            <div class="col col-md-8">
				            	<input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country',$partner->country) }}" required>
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
				            	<input id="address" type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address',$partner->address) }}" required>
				            </div>
				            @if ($errors->has('address'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('address') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group">
				        	<a href="{{ route('partner.index') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
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


@endsection