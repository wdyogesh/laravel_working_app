@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Administrator Profile</h3>

					<form class="form-group">

						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col col-md-4">
								<img src="{{ route('user.avatar', Auth::user()->avatar_path) }}" alt="Image not found." width="128" height="128">
							</div>
						</div>
							
						<div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-6 col-md-4 col-form-label">First Name</label>
							<div class="col col-md-8">
								<input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" disabled>
							</div>
						</div>

						<div class="form-group row{{ $errors->has('family_name') ? ' has-error' : '' }}">
						        <label for="family_name" class="col-6 col-md-4 col-form-label">Family Name</label>
								<div class="col col-md-8">
									<input id="family_name" type="text" class="form-control" name="family_name" value="{{ Auth::user()->last_name }}" disabled>
								</div>
							</div>

				        <div class="form-group row{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
				            <label for="mobile_number" class="col-6 col-md-4 col-form-label">Mobile Number</label>
				            <div class="col col-md-8">
				            	<input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ $admin->mobile_number }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Gender</label>
				            <div class="col col-md-8">
				            	<input id="gender" type="text" class="form-control" name="gender" value="{{ $admin->gender }}" disabled>
				            </div>
				        </div>

				        <div class="form-group row{{ $errors->has('date_birth') ? ' has-error' : '' }}">
				            <label for="date_birth" class="col-6 col-md-4 col-form-label">Date of Birth</label>
				            <div class="col col-md-8">
				            	<input id="date_birth" type="date" class="form-control" name="date_birth" placeholder="Date of Birth" value="{{ $admin->date_birth }}" disabled>
				            </div>
				        </div>

				        <div class="form-group">
				            <a href="{{ route('admin.index') }}" class="btn btn-primary" role="button" aria-pressed="true">Dashboard</a>
				        	<a href="{{ route('admin.edit', $admin->user->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>
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