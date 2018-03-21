@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Personal Information - Editar</h3>

					<form class="form-group" method="POST" action="{{ route('admin.update', $admin->user_id) }}" enctype="multipart/form-data">
			        	{{ csrf_field() }}
			        	<input type="hidden" name="_method" value="put">

			        	<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', Auth::user()->avatar_path) }}" alt="" width="128" height="128">
							</div>
							<div class="col col-md-8">
								
								<input id="profile_picture" type="file" class="form-control" name="profile_picture">
							</div>
						</div>

			        	<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First Name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
							</div>
							@if ($errors->has('first_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('first_name') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('last_name') ? ' has-error' : '' }}">
						    <label for="last_name" class="col-6 col-md-4 col-form-label">Family Name</label>
							<div class="col col-md-8">
								<input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
							</div>
							@if ($errors->has('last_name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('last_name') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group row{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
				            <label for="mobile_number" class="col-6 col-md-4 col-form-label">Mobile Number</label>
				            <div class="col col-md-8">
				            	<input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ $admin->mobile_number }}">
				            </div>
				            @if ($errors->has('mobile_number'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('mobile_number') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="gender" name="gender">
					            	@if ($admin->gender == 'Male')
						                <option value="Male" selected>Male</option>
						                <option value="Female">Female</option>
					                @else
						                <option value="Male">Male</option>
						                <option value="Female" selected>Female</option>
					                @endif
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
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{ $admin->date_birth }}">
				            </div>
				            @if ($errors->has('date_birth'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('date_birth') }}</strong>
				                </span>
				            @endif
				        </div>


				        <div class="form-group">
				        	<a href="{{ route('admin.show', $admin->user_id) }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
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