@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    <h1>Host Dashboard</h1>
	    <nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('host.index') }}">Home</a>
			<a class="breadcrumb-item" href="{{ route('host.show', $host->id) }}">Profile</a>
			<a class="breadcrumb-item" href="{{ route('booking.index') }}">Bookings</a>
			<a class="breadcrumb-item" href="{{ route('house.index') }}">Houses</a>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>House Details</h3>

					<form class="form-group" method="POST" action="{{ route('house.store') }}">
			        	{{ csrf_field() }}

			        	<div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
				            <label for="title" class="col-6 col-md-4 col-form-label">Title</label>
				            <div class="col col-md-8">
				            	<input id="title" type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required autofocus>
				            </div>
				            @if ($errors->has('title'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('title') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
				            <label for="description" class="col-6 col-md-4 col-form-label">About the home</label>
				            <div class="col col-md-8">
				            	<input id="description" type="text" class="form-control" name="description" placeholder="About the home" value="{{ old('description') }}" required>
				            </div>
				            @if ($errors->has('description'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('description') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="checkboxes">House Facilities</label>
				        	<div class="col-md-8">
					        @foreach($features as $feature)
								
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features[]" 
												id='Feature{{ $feature->id}}' 
												value="{{ old('feature') }}">{{$feature->friendly_name}}
									</label>

							@endforeach
							</div>
						</div>

						<div class='form-group row'>
							<div style="width: 700px;height: 400px;">
								<input id="pac-input" name="address" class="controls" type="text" placeholder="Enter a location" value="{{ old('pac-input') }}" required>
							    
							    <div id="map"></div>
							    <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude', $longitude) }}" hidden>
								<input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude', $latitude) }}" hidden>
								
								<script type="text/javascript" src="{{ asset('js/google_maps.js') }}"></script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsXlGhs6l5zYTzNIdXYxOK2ko7njcc5OY&libraries=places&callback=initMap" async defer></script>
								

							</div>
						</div>


						<div class="form-group row{{ $errors->has('about_area') ? ' has-error' : '' }}">
				            <label for="about_area" class="col-6 col-md-4 col-form-label">About the area</label>
				            <div class="col col-md-8">
				            	<input id="about_area" type="text" class="form-control" name="about_area" placeholder="About the area" value="{{ old('about_area') }}" required>
				            </div>
				            @if ($errors->has('about_area'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('about_area') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="checkboxes">Local area amenities</label>
				        	<div class="col-md-8">
					        @foreach($local_amenities as $amenitie)
								
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="local_amenities[]" 
												id='amenitie{{ $amenitie->id}}' 
												value="{{ old('amenitie') }}">{{$amenitie->friendly_name}}
									</label>
								
							@endforeach
							</div>
						</div>

				        <div class="form-group">
					        <a href="{{ route('house.index') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				            <button class="btn btn-primary" type="submit">Save informations</button>
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