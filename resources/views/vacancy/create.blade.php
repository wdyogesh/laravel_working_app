@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Add vacancy</h3>

					<form class="form-group" method="POST" action="{{ route('vacancy.store') }}">
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

				        <div class="form-group row{{ $errors->has('bed_type') ? ' has-error' : '' }}">
				            <label for="bed_type" class="col-6 col-md-4 col-form-label">Bed type</label>
				            <div class="col col-md-8">
				            	<select class="form-control" id="bed_type" name="bed_type" placeholder="Title">
				                    <option value="single">1 Single bed</option>
				                    <option value="two-singles">2 Single bed</option>
				                    <option value="double">1 Double</option>
				                </select>
				            </div>
				            @if ($errors->has('bed_type'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('bed_type') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('bathroom_type') ? ' has-error' : '' }}">
				            <label for="bathroom_type" class="col-6 col-md-4 col-form-label">Bathroom type</label>
				            <div class="col col-md-8">
				            	<select class="form-control" id="bathroom_type" name="bathroom_type"">
				                    <option value="ensuite">Ensuite - within room</option>
				                    <option value="share">Shared - with family</option>
				                    <option value="private">Private - exclusive to the student</option>
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
												value="{{ old('feature',$feature->name) }}"> {{ $feature->friendly_name }}
									</label>

							@endforeach
							</div>
						</div>

						<div class="form-group row">
				            <label for="is_available" class="col-6 col-md-4 col-form-label">Is this vacancy available?</label>
				            <div class="col col-md-8">
				                <select class="form-control" id="is_available" name="is_available"">
				                    <option value=0 selected>No</option>
				                    <option value=1>Yes</option>
				                </select>
				            </div>
				        </div>

				        <div class="form-group">
					        <a href="{{ route('vacancy.index', $house_id) }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				            <button class="btn btn-primary" type="submit">Save informations</button>
				        </div>

				        <input id="house_id" type="text" class="form-control" name="house_id" value="{{ $house_id }}" hidden>

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