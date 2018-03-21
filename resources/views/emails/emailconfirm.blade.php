@extends('layouts.master')

@section('content')

<div class='starter-template'>

    <div class='panel panel-default'>

		<div class='panel-heading'>Registration Confirmed</div>

		<div class='panel-body'>
          	Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
		</div>
		
	</div>
</div>



@endsection