@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Create new user</h3>

					<form class="form-group" method="POST" action="{{ route('admin.user.role.store', Auth::user()->id) }}">
			        	{{ csrf_field() }}

			        	<div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
				            <label for="name" class="col-6 col-md-4 col-form-label">Role name</label>
				            <div class="col col-md-8">
				            	<input id="name" type="text" class="form-control" name="name" placeholder="Role Name" value="{{ old('name') }}" required autofocus>
				            </div>
				            @if ($errors->has('name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('name') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
				            <label for="description" class="col-6 col-md-4 col-form-label">Description</label>
				            <div class="col col-md-8">
				            	<input id="description" type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}" required>
				            </div>
				            @if ($errors->has('description'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('description') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="form-group row{{ $errors->has('permission') ? ' has-error' : '' }}" id="permission" name="permission">
    						<label for="permission" class="col-6 col-md-4 col-form-label">Permissions</label>
    						<div class="col col-md-8">
	    						@foreach($permissions as $permission)
									<label class="checkbox-inline">
										<input type="checkbox" 
												name="permission[]" 
												id='{{ $permission->id}}' 
												value="{{ old('permission', $permission->id) }}"
												>{{$permission->friendly_name}}
									</label>
								@endforeach
    						</div>
    						@if ($errors->has('permission'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('permission') }}</strong>
				                </span>
				            @endif
						</div>

				        <div class="form-group">
				        	<a href="{{ route('admin.user.role.index') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
				            <button class="btn btn-primary" type="submit" ">Save Information</button>
				        </div>
				    </form>

				</div>
			</div>
		</div>
    </div>


@endsection