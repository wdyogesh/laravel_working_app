@extends('layouts.master')

@section('content')

	<div class="starter-template">

        @include('layouts.header')

		<h1>Log Information</h1>
		@if($user_id)
			<a href="{{ route('admin.log.create', $user_id) }}" class="btn btn-primary" role="button" aria-pressed="true">Add Log</a>
		@endif
		@if($logs->count())
			<table class="table">
				<thead class="thead-inverse">
					<tr>
						<th>Log number</th>
						<th>Log type</th>
						<th>Log subject</th>
						<th>Log content</th>
						<th>Created at</th>
					</tr>
				</thead>
				<tbody>
					@foreach($logs as $log)
						<tr>
							<th scope='row'>
								{{ $log->id }}
							</th>
							<th>
								{{ $log->type }}
							</th>
							<td>
								{{ $log->subject }}
							</td>
							<td>
								{{ $log->content }}
							</td>
							<td>
								{{ $log->created_at }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
							
		@else
			<h5>Logs not found.</h5>
		@endif

	</div>

@endsection