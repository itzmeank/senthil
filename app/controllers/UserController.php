<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends BaseController {

	/**
	 * Displays the form for account creation
	 *
	 */
	
	public function create()
	{
		return View::make(Config::get('confide::signup_form'));
	}

	/**
	 * Stores new account
	 *
	 */
	public function store()
	{
	
	      $userdata = array(
           	'name' => Input::get('username'),
			'email' => Input::get('email'),
			'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation')
			  );
	 		  
	     $rules = array(
            'name'                  => 'required|min:3|max:80|alpha_dash',
            'email'                 => 'required|between:3,64|email|unique:users',
            'password'              => 'required|alpha_num|between:4,8|confirmed',
            'password_confirmation' => 'required|alpha_num|between:4,8'
        );

        // Validate the inputs.
      
		
		$user = new User;

		$user->username  = Input::get( 'username' );
		//$user->firstname = Input::get( 'firstname' );
		//$user->lastname  = Input::get( 'lastname' );
		$user->email     = Input::get( 'email' );
		$user->password  = Input::get( 'password' );

		// The password confirmation will be removed from model
		// before saving. This field will be used in Ardent's
		// auto validation.
		$user->password_confirmation = Input::get( 'password_confirmation' );
		  $validator = Validator::make($userdata, $rules);
		
		if ($validator->passes()) {
		// Save if valid. Password field will be hashed before save
		$user->save();

		//if ( $user->id )
		//{
			// Redirect with success message, You may replace "Lang::get(..." for your custom message.
			return Redirect::action('UserController@login')
				->with( 'success', 'Thanks for registering' );
		}
		else
		{
			// Get validation errors (see Ardent package)
			//$error = $user->errors()->all(':message');

			return Redirect::action('UserController@create')
				->withInput()
				->withErrors($validator->messages());
		}
	}

	/**
	 * Displays the login form
	 *
	 */
	public function login()
	{
		//if( Confide::user() )
		//{
			//return Redirect::action('Admin\DashboardController@index');
		//}
		//else
		//{
			return View::make(Config::get('confide::login_form'));
		//}
	}

	/**
	 * Attempt to do login
	 *
	 */
	public function do_login()
	{
	
		$input = array(
			
			'email'    => Input::get( 'email' ), 
			'username' => Input::get( 'email' ),// May be the username too // so we have to pass both
			'password' => Input::get( 'password' ),
			'remember' => Input::get( 'remember' ),
		);

		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( Confide::logAttempt( $input,true  ) ) 
		{
			// If the session 'loginRedirect' is set, then redirect
			// to that route. Otherwise redirect to '/'
			$r = Session::get('loginRedirect');
			if (!empty($r))
			{
				Session::forget('loginRedirect');
				return Redirect::to($r);
			}
			
			//return Redirect::to('/'); // change it to '/admin', '/dashboard' or something
			 return Redirect::to('')->with('success', 'You have logged in successfully');
		}
		else
		{
		$user = new User;
			// Check if there was too many login attempts
			if( Confide::isThrottled( $input ) )
			{
				$err_msg = Lang::get('confide.alerts.too_many_attempts');
			}
			elseif( $user->checkUserExists($input) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide.alerts.not confirmed');
            }
			else
			{
				$err_msg = Lang::get('confide.alerts.wrong_credentials');
			}

			return Redirect::action('UserController@login')
				->withInput(Input::except('password'))
				->with( 'error', $err_msg );
		}
	}

	/**
	 * Attempt to confirm account with code
	 *
	 * @param  string  $code
	 */
	public function confirm( $code )
	{
		if ( Confide::confirm( $code ) )
		{
			$notice_msg = Lang::get('confide.alerts.confirmation');
			return Redirect::action('UserController@login')
				->with( 'success', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide.alerts.wrong_confirmation');
			return Redirect::action('UserController@login')
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Displays the forgot password form
	 *
	 */
	public function forgot_password()
	{
		return View::make(Config::get('confide::forgot_password_form'));
	}

	/**
	 * Attempt to send change password link to the given email
	 *
	 */
	public function do_forgot_password()
	{
		if( Confide::forgotPassword( Input::get( 'email' ) ) )
		{
			$notice_msg = Lang::get('confide.alerts.password_forgot');
			return Redirect::action('UserController@login')
				->with( 'success', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide.alerts.wrong_password_forgot');
			return Redirect::action('UserController@forgot_password')
				->withInput()
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Shows the change password form with the given token
	 *
	 */
	public function reset_password( $token )
	{
		$this->layout->content = View::make(Config::get('confide::reset_password_form'))
									->with('token', $token);
	}

	/**
	 * Attempt change password of the user
	 *
	 */
	public function do_reset_password()
	{
		$input = array(
			'token'=>Input::get( 'token' ),
			'password'=>Input::get( 'password' ),
			'password_confirmation'=>Input::get( 'password_confirmation' ),
		);

		// By passing an array with the token, password and confirmation
		if( Confide::resetPassword( $input ) )
		{
			$notice_msg = Lang::get('confide.alerts.password_reset');
			return Redirect::action('UserController@login')
				->with( 'success', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide.alerts.wrong_password_reset');
			return Redirect::action('UserController@reset_password', array('token'=>$input['token']))
				->withInput()
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Log the user out of the application.
	 *
	 */
	public function logout()
	{
		Confide::logout();
		
		 return Redirect::to('/');
	}

}
?>