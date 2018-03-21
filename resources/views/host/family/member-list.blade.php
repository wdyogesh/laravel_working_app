@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Family Members</h3>
						<a href="{{ route('family.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Add Family Member</a>
						@if($family_members->count())
							<table class="table">
								<thead class="thead-inverse">
									<tr>
										<th>Family Member Name</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach($family_members as $member)
										<tr>
											<td scope='row'>{{$member->first_name.' '.$member->last_name}}</td>
											<td><a title='Edit' class='waves-effect waves-light btn' href=" {{ route('family.edit', $member->id)}} "><i class='material-icons right'>edit</i></a></td>
											<td><a title='Delete' class='waves-effect waves-light btn' href=" {{ route('family.destroy', $member->id)}} "><i class='material-icons right'>delete</i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<h5>Family members not found.</h5>
						@endif

						<div class="form-group">
					    @if ($host->profile_completed == 0)
					        <a href="{{ route('house.show',0) }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
					    @endif
				    </div>

				    
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