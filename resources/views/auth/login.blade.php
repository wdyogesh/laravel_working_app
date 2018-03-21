@extends('layouts.master')

@section('content')
<div class="container">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <h2 class="form-signin-heading">Please sign in</h2>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember"{{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <a class="btn btn-lg btn-primary btn-block" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </form>
</div>
@endsection


