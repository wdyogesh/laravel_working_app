@extends('layouts.master')

@section('content')
<link href="/css/starter-template.css" rel="stylesheet">

      <div class="starter-template">
        <h1>{{$home->title}}</h1>
        <ul class="list-group">
		  <li class="list-group-item">Host ID: {{$home->host_id}}</li>
		  <li class="list-group-item">Description: {{$home->description}}</li>
		  <li class="list-group-item">Address: {{$home->address}}</li>
		  <li class="list-group-item">Postcode: {{$home->postcode}}</li>
		</ul>
      </div>

@endsection