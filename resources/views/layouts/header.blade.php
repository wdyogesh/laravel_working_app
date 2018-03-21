

	@if(session('user_role') == 'admin')

	    <h1>Admin</h1>
        <nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('admin.index') }}">Home</a>
			<a class="breadcrumb-item" href="{{ route('admin.show', session('user_id')) }}">Profile</a>
			<a class="breadcrumb-item" href="{{ route('admin.booking') }}">Bookings</a>
			<a class="breadcrumb-item" href="{{ route('admin.student') }}">Students</a>
			<a class="breadcrumb-item" href="{{ route('admin.host') }}">Hosts</a>
			<a class="breadcrumb-item" href="{{ route('admin.partner') }}">Partners</a>
			<a class="breadcrumb-item" href="{{ route('admin.pickup') }}">Pickups</a>
			<a class="breadcrumb-item" href="{{ route('admin.user.index') }}">Users</a>
			<a class="breadcrumb-item" href="{{ route('admin.log.index') }}">Logs</a>
		</nav>

	@elseif(session('user_role') == 'host')

		<h1>Host</h1>
		<nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('host.index') }}">Home</a>
			<a class="breadcrumb-item" href="{{ route('host.booking') }}">Bookings</a>
			<a class="breadcrumb-item" href="{{ route('host.show', session('user_id')) }}">Profile</a>
			<a class="breadcrumb-item" href="{{ route('family.index') }}">Family</a>
			@if($host->host_type == "homestay")
				<a class="breadcrumb-item" href="{{ route('house.show',0) }}">House</a>
			@else
				<a class="breadcrumb-item" href="{{ route('house.index') }}">Houses</a>
			@endif
		</nav>

	@elseif(session('user_role') == 'student')

		<h1>Student</h1>
		<nav class="breadcrumb">
			<a class="breadcrumb-item" href=" {{ route('student.index') }} ">Home</a>
			<a class="breadcrumb-item" href=" {{ route('student.show', session('user_id')) }}">Profile</a>
			<a class="breadcrumb-item" href=" {{ route('student.booking') }} ">Booking</a>
		</nav>

		

	@elseif(session('user_role') == 'partner')

		<h1>Partner</h1>
	    <nav class="breadcrumb">
			<a class="breadcrumb-item" href="{{ route('partner.index') }}">Home</a>
			<a class="breadcrumb-item" href="{{ route('partner.show', session('user_id')) }}">Profile</a>
			<a class="breadcrumb-item" href="{{ route('partner.booking') }}">Bookings</a>
			<a class="breadcrumb-item" href="{{ route('partner.student') }}">Students</a>
		</nav>

		
	@endif

