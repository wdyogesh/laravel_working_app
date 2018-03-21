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

			<div class="jumbotron jumbotron-fluid">
			  	<div class="container">
			    	<h2 class="display-3">THANKS FOR COMPLET YOUR PROFILE!</h2>
			    	<p class="lead">Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se o fenômeno da Internet obstaculiza a apreciação da importância da gestão inovadora da qual fazemos parte.</p>
			    	<a class="btn btn-primary" href="{{ route('host.index') }}" role="button">Back to Dashboard</a>
			  	</div>
			</div>
      </div>


@endsection