@extends('layouts.master')

@section('content')

    <div class="starter-template">

        @include('layouts.header')

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
			    <h2 class="display-3">HOST SOMETHING</h2>
			    <p class="lead">
			    	@if($host->status == 0)
			    		Host pending approval
			    	@elseif($host->status == 1)
			    		Host approved
			    	@elseif($host->status == 2)
			    		Host on hold
			    	@endif
			    </p>
			    @if($host->profile_completed == 0)
			    	<a class="btn btn-primary" href="{{ route('host.show', $host->user_id) }}" role="button">Complete your application here! ;-)</a>
			    @endif

			</div>
		</div>
    </div>

@endsection