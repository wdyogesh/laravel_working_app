@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>House Details</h3>

					<form class="form-group">

			        	<div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
				            <label for="title" class="col-6 col-md-4 col-form-label">Title</label>
				            <div class="col col-md-8">
				            	<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $house->title) }}" disabled>
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
				            	<input id="description" type="text" class="form-control" name="description" value="{{ old('description', $house->description) }}" disabled>
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
												value="{{ old('feature', $feature->name) }}"
												@if ($house->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif
												disabled>{{$feature->friendly_name}}
									</label>
								
							@endforeach
							</div>
						</div>

						<div class='form-group row'>
							<div style="width: 700px;height: 400px;">
								<input id="pac-input" name="pac-input" class="controls" type="text" placeholder="Enter a location" value="{{ old('pac-input', $house->address) }}" disable>
							    
							    <div id="map"></div>
							    <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude', $house->longitude) }}" hidden disabled>
								<input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude', $house->latitude) }}" hidden disabled>

								<script type="text/javascript" src="{{ asset('js/google_maps.js') }}"></script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsXlGhs6l5zYTzNIdXYxOK2ko7njcc5OY&libraries=places&callback=initMap" async defer></script>
							</div>
						</div>
						
				        <div class="form-group row{{ $errors->has('about_area') ? ' has-error' : '' }}">
				            <label for="about_area" class="col-6 col-md-4 col-form-label">About the area</label>
				            <div class="col col-md-8">
				            	<input id="about_area" type="text" class="form-control" name="about_area" value="{{ old('about_area', $house->about_area) }}" disabled>
				            </div>
				            @if ($errors->has('about_area'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('about_area') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="local_amenities">Local area amenities</label>
				        	<div class="col-md-8">
					        
							@foreach($local_amenities as $amenitie)
								<label class="checkbox-inline">
								<input type="checkbox" 
										name="local_amenities[]" 
										id='amenitie{{ $amenitie->id}}' 
										value="{{ old('amenitie', $amenitie->name) }}"
										@if ($house->features()->where('id', $amenitie->id)->exists() == 1)
											checked
										@endif
										disabled>{{$amenitie->friendly_name}}
									</label>
							@endforeach
							</div>
						</div>

						<div class="form-group">
				        	<a href="{{ route('house.edit', $house->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit Information</a>

							<a href="{{ route('vacancy.index', $house->id) }}" class="btn btn-primary" role="button" aria-pressed="true">
								@if($host->profile_completed == 0)
									Next step
								@else
									Vacancy list
								@endif
							</a>

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