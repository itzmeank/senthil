@extends('layouts.master')

@section('main')
<div class="container first-item">
    <form method="POST" action="{{{ URL::action('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
        <input type="hidden" name="csrf_token" value="{{{ Session::getToken() }}}">
    <div class="span4 offset3 well">
    
        <div class="control-group">
            <div class="controls">
                <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                <input tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <label for="password">
                {{{ Lang::get('confide::confide.password') }}}
                <small>
                    <a href="{{{ (URL::action('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                </small>
                </label>
                <input tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">

            </div>
        </div> 

        <div class="control-group">
            <div class="control">
                <label for="remember">{{{ Lang::get('confide::confide.login.remember') }}}</label>
                <input type="hidden" name="remember" value="0">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                
            </div>
        </div>

        <div>
            @if ( Session::get('error') )
                <div class="alert alert-error">{{{ Session::get('error') }}}</div>
            @endif

            @if ( Session::get('notice') )
                <div class="alert">{{{ Session::get('notice') }}}</div>
            @endif
        </div>
        <div class="control-group">
            <div class="control">
                <button tabindex="3" type="submit" class="btn">{{{ Lang::get('confide::confide.login.submit') }}}</button>
            </div>
        </div>
      
    </div>    
    </form>
</div>

@stop