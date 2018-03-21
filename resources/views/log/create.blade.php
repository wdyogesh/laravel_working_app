@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Log Add</h3>

					<form class="form-group" method="POST" action="{{ route('admin.log.store', $user_id) }}">
			        	{{ csrf_field() }}
						
						<div class="form-group row{{ $errors->has('log_type') ? ' has-error' : '' }}">
				            <label for="log_type" class="col-6 col-md-4 col-form-label">Log Type</label>
				            <div class="col col-md-8">
					            <select class="form-control" id="log_type" name="log_type">
					            	<option value="E-Mail" selected>E-Mail</option>
						            <option value="Phone">Phone</option>
					            </select>
					        </div>
				            @if ($errors->has('log_type'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('log_type') }}</strong>
				                </span>
				            @endif
				        </div>

						<div class="form-group row{{ $errors->has('log_subject') ? ' has-error' : '' }}">
						    <label for="log_subject" class="col-6 col-md-4 col-form-label">Log Subject</label>
							<div class="col col-md-8">
								<input id="log_subject" type="text" class="form-control" name="log_subject" value="{{ old('log_subject') }}" >
							</div>
							@if ($errors->has('log_subject'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('log_subject') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group row{{ $errors->has('log_content') ? ' has-error' : '' }}">
				            <label for="log_content" class="col-6 col-md-4 col-form-label">Log Content</label>
				            <div class="col col-md-8">
				            	<input id="log_content" type="text" class="form-control" name="log_content" value="{{ old('log_content') }}" >
				            </div>
				            @if ($errors->has('log_content'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('log_content') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group">
				        	@if(Auth::user()->isHost())
					        @elseif(Auth::user()->isAdmin())
					            <a href="{{ route('admin.index') }}" class="btn btn-primary" role="button" aria-pressed="true">Cancel</a>
					        	<button class="btn btn-primary" type="submit" aria-pressed="true">Save Information</button>
					        @elseif(Auth::user()->isStudent())
					        @elseif(Auth::user()->isPartner())
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