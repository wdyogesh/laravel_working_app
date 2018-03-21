@extends('layouts.master')

@section('content')

	<div class="starter-template">

	    <h1>Host Dashboard</h1>
	    <nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('HostIndex') }}">Home</a>
			<a class="breadcrumb-item" href="{{ route('HostProfile') }}">Profile</a>
			<a class="breadcrumb-item" href="{{ route('BookingList') }}">Bookings</a>
			<a class="breadcrumb-item" href="{{ route('HouseList') }}">Houses</a>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Photos</h3>

					<form class="form-group" method="POST" action="{{ route('register') }}">
			        	{{ csrf_field() }}

						
						@if (Auth::user()->host->first()->host_type == 'share-house')
							<a href="{{ route('register.finish') }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
						@else
							<a href="{{ route('other.info.show', Auth::user()->host->first()->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Next step</a>
						@endif
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