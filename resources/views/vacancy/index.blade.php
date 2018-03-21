@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    @include('layouts.header')

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Vacancies</h3>
						@if($vacancies->count())
							<table class="table">
								<thead class="thead-inverse">
									<tr>
										<th>Vacancy Name</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
								@foreach($vacancies as $vacancy)
									
										<tr>
											<td scope='row'>{{ $vacancy->title }}</td>
											<td><a title='Edit' class='waves-effect waves-light btn' href=" {{ route('vacancy.edit', $vacancy->id)}} "><i class='material-icons right'>edit</i></a></td>
											<td>
												<a title='Delete' class='waves-effect waves-light btn' href=" {{ route('vacancy.destroy', $vacancy->id)}} "><i class='material-icons right'>delete</i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							
						@else
							<h5>Vacancy not found.</h5>
						@endif
					<a href="{{ route('vacancy.create', $house_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Add Vacancy</a>

				    @if ($host->host_type == 'share-house')
				        <a href="{{ route('house.index', $house_id) }}" class="btn btn-primary" role="button" aria-pressed="true">House list</a>
				    @else
				    	@if($host->profile_completed == 0)
				        	<a href="{{ route('register.finish') }}" class="btn btn-primary" role="button" aria-pressed="true">Finish</a>
				        @endif
				    @endif
				        

				    
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