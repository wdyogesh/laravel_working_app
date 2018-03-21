@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#div_partner').hide();

        $('#user_type').change(function() {
            if ($('#user_type').val() == 'host') {
                $('#div_host').show();
                $('#div_partner').hide();
            } else {
                $('#div_host').hide();
                $('#div_partner').show();

            }


        });
    });
</script>


<div class="container">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <h2 class="form-signin-heading">Register</h2>

        <div class="form-group row{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-6 col-md-4 col-form-label">First Name</label>
            <div class="col col-md-8">
                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
            </div>
            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-6 col-md-4 col-form-label">Last Name</label>
            <div class="col col-md-8">
                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>
            </div>
            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-6 col-md-4 col-form-label">Email address</label>
            <div class="col col-md-8">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="user_type" class="col-6 col-md-4 col-form-label">You want to be an:</label>
            <div class="col col-md-8">
                <select class="form-control" id="user_type" name="user_type"">
                    <option value="host" selected>Host</option>
                    <option value="partner">Partner</option>
                </select>
            </div>
        </div>

        <div id="div_host">
            <div class="form-group row{{ $errors->has('host_type') ? ' has-error' : '' }}" id="select_host_type">
                
                <label for="host_type" class="col-6 col-md-4 col-form-label">What type of host do you want to be?</label>
                <div class="col col-md-8">
                    <select class="form-control" id="host_type" name="host_type">
                        <option value="homestay">Homestay</option>
                        <option value="share-house">Share House</option>
                    </select>
                </div>

                @if ($errors->has('host_type'))
                    <span class="help-block">
                    <strong>{{ $errors->first('host_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div id="div_partner">

            <div class="form-group row{{ $errors->has('business_name') ? ' has-error' : '' }}">
                <label for="business_name" class="col-6 col-md-4 col-form-label">What company do you represent?</label>
                <div class="col col-md-8">
                    <input id="business_name" type="text" class="form-control" name="business_name" placeholder="Business name" value="{{ old('business_name') }}">
                </div>
                @if ($errors->has('business_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('business_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('partner_type') ? ' has-error' : '' }}">
                
                <label for="partner_type" class="col-6 col-md-4 col-form-label">What type of partner are you?</label>
                <div class="col col-md-8">
                    <select class="form-control" id="partner_type" name="partner_type">
                        <option value="student_agency">Student Agency</option>
                        <option value="education_provider">Education Provider</option>
                    </select>
                </div>

                @if ($errors->has('partner_type'))
                    <span class="help-block">
                    <strong>{{ $errors->first('partner_type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="col-6 col-md-4 col-form-label">Country</label>
                <div class="col col-md-8">
                    <input id="country" type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country') }}">
                </div>
                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-6 col-md-4 col-form-label">Address</label>
                <div class="col col-md-8">
                    <input id="address" type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">
                </div>
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                <label for="phone_number" class="col-6 col-md-4 col-form-label">Phone number</label>
                <div class="col col-md-8">
                    <input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}">
                </div>
                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('business_registration_number') ? ' has-error' : '' }}">
                <label for="business_registration_number" class="col-6 col-md-4 col-form-label">Business Registration Number</label>
                <div class="col col-md-8">
                    <input id="business_registration_number" type="text" class="form-control" name="business_registration_number" placeholder="Business registration number" value="{{ old('business_registration_number') }}">
                </div>
                @if ($errors->has('business_registration_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('business_registration_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">
                <label for="website" class="col-6 col-md-4 col-form-label">Website</label>
                <div class="col col-md-8">
                    <input id="website" type="text" class="form-control" name="website" placeholder="Website" value="{{ old('website') }}">
                </div>
                @if ($errors->has('website'))
                    <span class="help-block">
                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">

            <label for="password" class="col-6 col-md-4 col-form-label">Password</label>
            <div class="col col-md-8">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-6 col-md-4 col-form-label">Confirm Password</label>
            <div class="col col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
        </div>

        <div class="form-group row" 
           {!! app('captcha')->display(); !!}
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
    </form>
</div>


@endsection
