@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3></h3>

					<form class="form-group" method="POST" action="{{ route('other.info.update', $host->id) }}">
			        	{{ csrf_field() }}
			        	<input type="hidden" name="_method" value="put">

				        <div class="form-group row{{ $errors->has('welcome') ? ' has-error' : '' }}" id="welcome" name="welcome">
    						<label for="welcome" class="col-6 col-md-4 col-form-label">Family Welcomes</label>
    						<div class="col col-md-8">
	    						@foreach($features_welcomes as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_welcome[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
													checked
												@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('welcome'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('welcome') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('hosted_students_before') ? ' has-error' : '' }}">
    						<label for="hosted_students_before" class="col-6 col-md-4 col-form-label">Have you ever hosted student before?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="hosted_students_before" name="hosted_students_before">
				            			<option value='1'
				            			@if ($host->hosted_students_before == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            			<option value='0'
				            			@if ($host->hosted_students_before == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('hosted_students_before'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('hosted_students_before') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('since_when') ? ' has-error' : '' }}" id="div_year"
						@if($host->hosted_students_before == 0)
							style="display:none"
						@endif >
				            <label for="since_when" class="col-6 col-md-4 col-form-label">Since when?</label>
				            <div class="col col-md-8">
				            	<input id="since_when" type="text" class="form-control" name="since_when" placeholder="Year" value="{{ old('since_when', $host->since_when) }}">
				            </div>
				        </div>

						<div class="form-group row{{ $errors->has('can_students_smoke') ? ' has-error' : '' }}" id="div_can_students_smoke" name="can_students_smoke">
    						<label for="can_students_smoke" class="col-6 col-md-4 col-form-label">Can students smoke in your homestay?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="can_students_smoke" name="can_students_smoke">
								    <option value='1'
				            			@if ($host->can_students_smoke == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->can_students_smoke == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('can_students_smoke'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('can_students_smoke') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('smoking_where') ? ' has-error' : '' }}" id="div_smoking_where" name="smoking_where"
						@if($host->can_students_smoke == 0)
							style="display:none"
						@endif >
    						<label for="smoking_where" class="col-6 col-md-4 col-form-label">In which area?</label>
    						<div class="col col-md-8">
								@foreach($features_smoking as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_smoking[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('smoking_where'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('smoking_where') }}</strong>
				                </span>
				            @endif
						</div>

					
						<div class="form-group row{{ $errors->has('have_pets') ? ' has-error' : '' }}" id="div_have_pets" name="have_pets">
    						<label for="have_pets" class="col-6 col-md-4 col-form-label">Do you have pets?</label>
    						<div class="col col-md-8">
								<select class="form-control" id="have_pets" name="have_pets">
								    <option value='1'
				            			@if ($host->have_pets == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->have_pets == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('have_pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('have_pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('pets') ? ' has-error' : '' }}" id="div_pets" name="pets"
						@if($host->have_pets == 0)
							style="display:none"
						@endif >
    						<label for="pets" class="col-6 col-md-4 col-form-label">Select type of pets:</label>
    						<div class="col col-md-8">
								@foreach($features_pet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_pet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('pets'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('pets') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('special_dietarian') ? ' has-error' : '' }}" id="div_special_dietarian" name="special_dietarian">
    						<label for="special_dietarian" class="col-6 col-md-4 col-form-label">Any Special Diets?</label>
    						<div class="col col-md-8">
	    						<select class="form-control" id="special_dietarian" name="special_dietarian">
								    <option value='1'
				            			@if ($host->special_dietarian == 1)
				            				selected
				            			@endif
				            			> Yes </option>
				            		<option value='0'
				            			@if ($host->special_dietarian == 0)
				            				selected
				            			@endif
				            			> No </option>
	    						</select>
    						</div>
    						@if ($errors->has('special_dietarian'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('special_dietarian') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_diet') ? ' has-error' : '' }}" id="div_diets" name="features_diet"
						@if($host->special_dietarian == 0)
							style="display:none"
						@endif >
    						<label for="features_diet" class="col-6 col-md-4 col-form-label">Diet Type available on request</label>
    						<div class="col col-md-8">
	    						@foreach($features_diet as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_diet[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_diet'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_diet') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_art') ? ' has-error' : '' }}" id="features_hobby_art" name="features_hobby_art">
    						<label for="features_hobby_art" class="col-6 col-md-4 col-form-label">Select Art Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_art as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_art[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_art'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_art') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_lifestyle') ? ' has-error' : '' }}" id="features_hobby_lifestyle" name="features_hobby_lifestyle">
    						<label for="features_hobby_lifestyle" class="col-6 col-md-4 col-form-label">Select Lifestyle Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_lifestyle as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_lifestyle[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_lifestyle'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_lifestyle') }}</strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row{{ $errors->has('features_hobby_sports') ? ' has-error' : '' }}" id="features_hobby_sports" name="features_hobby_sports">
    						<label for="features_hobby_sports" class="col-6 col-md-4 col-form-label">Select Sport Interests</label>
    						<div class="col col-md-8">
	    						@foreach($features_hobby_sports as $feature)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="features_hobby_sports[]" 
												id='feature{{ $feature->id}}' 
												value="{{ old('feature', $feature->name) }}"
												@if ($host->features()->where('id', $feature->id)->exists() == 1)
					            					checked
					            				@endif
												>{{$feature->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('features_hobby_sports'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('features_hobby_sports') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group">
				        	<a href="{{ route('other.info.show', $host->id) }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(document).ready(function() {

    	if($('#hosted_students_before').val == 1)
    	{
    		$('#div_year').show();
    	}

        $('#hosted_students_before').change(function() {
            $('#div_year').toggle();
        });

        $('#can_students_smoke').change(function() {
            $('#div_smoking_where').toggle();
        });

        $('#have_pets').change(function() {
            $('#div_pets').toggle();
        });

		$('#special_dietarian').change(function() {
            $('#div_diets').toggle();
        });
    });

</script>

@endsection