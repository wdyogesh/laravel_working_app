@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Edit vacancy</h3>

					<form class="form-group" method="POST" action="{{ route('vacancy.update', $vacancy->id) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						
			        	<div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
				            <label for="title" class="col-6 col-md-4 col-form-label">Title</label>
				            <div class="col col-md-8">
				            	<input id="title" type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', $vacancy->title) }}" required autofocus>
				            </div>
				            @if ($errors->has('title'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('title') }}</strong>
				                </span>
				            @endif
				        </div>

				        @php 
				            $options = [
				            	"single" => "1 Single - 1 student",
				            	"two-singles" => "2 Singles - 2 students",
				            	"double" => "1 Double - 1 student",
				            	"double-couple" => "1 Double - 2 students",
				            	]
				        @endphp
				   

				        <div class="form-group row{{ $errors->has('bed_type') ? ' has-error' : '' }}" id="bed_type" name="bed_type">
    						<label for="bed_type" class="col-6 col-md-4 col-form-label">Bed type</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="bed_type" name="bed_type">
								     @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("bed_type", $vacancy->bed_type))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
	    						</select>
    						</div>
    						@if ($errors->has('bed_type'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('bed_type') }}</strong>
				                </span>
				            @endif
						</div>

						@php 
				            $options = [
				            	"ensuite" => "Ensuite - within room",
				            	"share-singles" => "Shared - with family",
				            	"private" => "Private - exclusive to the student",
				            	]
				        @endphp
				   

				        <div class="form-group row{{ $errors->has('bathroom_type') ? ' has-error' : '' }}" id="bathroom_type" name="bathroom_type">
    						<label for="bathroom_type" class="col-6 col-md-4 col-form-label">Bathroom type</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="bathroom_type" name="bathroom_type">
								     @foreach ($options as $key => $value)
				            			<option value="{{ $key }}"
				            			@if ($key == old("bathroom_type", $vacancy->bathroom_type))
				            				selected="selected"
				            			@endif
				            			> {{ $value }}</option>
				            		@endforeach
	    						</select>
    						</div>
    						@if ($errors->has('bathroom_type'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('bathroom_type') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class='form-group row'>
				        	<label class="col-6 col-md-4 col-form-label" for="checkboxes">Vacancy Facilities</label>
				        	<div class="col-md-8">
					        @foreach($features as $feature)
								
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features[]" 
												id='feature' 
												value="{{ old('feature',$feature->name) }}"
												@if ($vacancy->features()->where('id', $feature->id)->exists() == 1)
				            						checked
				            					@endif> {{ $feature->friendly_name }}
									</label>

							@endforeach
							</div>
						</div>


						<div class="form-group row{{ $errors->has('gender') ? ' has-error' : '' }}">
				            <label for="gender" class="col-6 col-md-4 col-form-label">Is this vacancy available?</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="is_available" name="is_available">
									@if ($vacancy->is_available == 0)
										<option value=0 selected>No</option>
						                <option value=1>Yes</option>
					                @else
						                <option value=0>No</option>
						                <option value=1 selected>Yes</option>
					                @endif
					            </select>
					        </div>
				        </div>


				        <div class="form-group">
					        <a href="{{ route('vacancy.index', $vacancy->house_id) }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
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