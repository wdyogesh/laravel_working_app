@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Family Members</h3>

					<form class="form-group" method="POST" action="{{ route('register') }}">
			        	{{ csrf_field() }}

			        	<div class="form-group row{{ $errors->has('fistname') ? ' has-error' : '' }}">
				            <label for="fistname" class="col-6 col-md-4 col-form-label">Name</label>
				            <div class="col col-md-8">
				            	<input id="fistname" type="text" class="form-control" name="fistname" placeholder="First Name" value="{{ old('fistname') }}" required autofocus>
				            </div>
				            @if ($errors->has('fistname'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('fistname') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('familyname') ? ' has-error' : '' }}">
				            <label for="familyname" class="col-6 col-md-4 col-form-label">Family Name</label>
				            <div class="col col-md-8">
				            	<input id="familyname" type="text" class="form-control" name="familyname" placeholder="Family Name" value="{{ old('familyname') }}" required>
				            </div>
				            @if ($errors->has('familyname'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('familyname') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('mobilenumber') ? ' has-error' : '' }}">
				            <label for="mobilenumber" class="col-6 col-md-4 col-form-label">Mobile Number</label>
				            <div class="col col-md-8">
				            	<input id="mobilenumber" type="text" class="form-control" name="mobilenumber" placeholder="Mobile Number" value="{{ old('mobilenumber') }}" required>
				            </div>
				            @if ($errors->has('mobilenumber'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('mobilenumber') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('occupation') ? ' has-error' : '' }}">
				            <label for="occupation" class="col-6 col-md-4 col-form-label">Occupation</label>
				            <div class="col col-md-8">
				            	<input id="occupation" type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{ old('occupation') }}" required>
				            </div>
				            @if ($errors->has('occupation'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('occupation') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="gender" name="gender">
					                <option value="Host">Male</option>
					                <option value="Student">Female</option>
					            </select>
					        </div>
				            @if ($errors->has('gender'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('gender') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('datebirth') ? ' has-error' : '' }}">
				            <label for="datebirth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="datebirth" type="date" class="form-control" name="datebirth" placeholder="Date of Birth" value="{{ old('datebirth') }}" required>
				            </div>
				            @if ($errors->has('datebirth'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('datebirth') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group">
				            <a href="{{ action('HostController@register_home_details') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Next Step</a>
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