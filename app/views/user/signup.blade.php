@extends('layouts.master')

@section('main')

	<form method="POST" action="{{ (URL::action('UserController@store')) ?: URL::to('user')  }}" accept-charset="UTF-8">
		<input type="hidden" name="csrf_token" value="{{ Session::getToken() }}">
		<fieldset>
			<label for="username">{{ Lang::get('confide.username') }}</label>
			<input placeholder="{{ Lang::get('confide.username') }}" type="text" name="username" id="username" value="{{ Input::old('username') }}">

			<label for="email">{{ Lang::get('confide.e_mail') }} <small>{{ Lang::get('confide.signup.confirmation_required') }}</small></label>
			<input placeholder="{{ Lang::get('confide.e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">

			<label for="password">{{ Lang::get('confide.password') }}</label>
			<input placeholder="{{ Lang::get('confide.password') }}" type="password" name="password" id="password">

			<label for="password_confirmation">{{ Lang::get('confide.password_confirmation') }}</label>
			<input placeholder="{{ Lang::get('confide.password_confirmation') }}" type="password" name="password_confirmation" id="password_confirmation">
           @if($errors->has())
 			<div class="alert alert-error">
  			 @foreach($errors->all() as $message)
    		{{ $message }}<br />
    		@endforeach
			</div>
			@endif
 

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">{{ Lang::get('confide.signup.submit') }}</button>
			</div>

		</fieldset>
	</form>

@stop