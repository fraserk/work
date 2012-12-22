<?php

	/**
	* User controller
	*/
	class User_Controller extends Base_Controller
	{
		public $restful=true;
		public function __construct()
		{
			$this->Filter('before','auth')->only(array('dashboard'));
		}
			function get_register()
		{
			return View::make('user.register');
		}



		public function POST_save()
		{
			

			$inputs = array(
					'email'=> Input::get('email'),
					'username'=>Input::get('username'),
					'password'=>Input::get('password'),
					'password_confirmation'=>Input::get('password_confirmation')
				);
			$rules = array(
					'email'=>'required|email|unique:users',
					'username'=>'required|min:4|unique:users',
					'password'=>'required|min:4|confirmed'
				);

				$validation = Validator::make($inputs, $rules);


				if ($validation->fails())
				{
					return Redirect::to_route('register')-> with_errors($validation)->with_input();
				}
			User::Create(array(
					'email' => Input::get('email'),
					'Username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'))
					));

						return Redirect::to_route('dashboard');
					}

		public function get_login()
		{
			return View::make('user.login');
		}

		public function POST_logincheck()
		{
			$credentials = array(
								'username' => Input::get('email'),
								'password' => Input::get('password')
				);

			if(Auth::attempt($credentials))
			{
				
				return Redirect::to_route('home'); 


			}
			{
				return Redirect::to_route('login');
			}
		}

		public function get_logout()
		{	

			Auth::logout();

			return Redirect::to_route('login')->with('Message','You are logged out.');

		}

		public function get_requestpassword()
		{
			return View::make('user.requestpassword');
		}

		public function POST_sendpassword()
		{
			if(!Input::get('email'))
				return Redirect::to_route('getpassword')
				->with('message','Please supply a email address')
				->with_input('only',array('email'));

			//verify User account exists
				$user = User::where_email(Input::get('email'))->first(); //get the user email
					if (!$user)
							return Redirect::to_route('getpassword')
													->with('message','Email could no be found')
													->with_input('only',array('email'));

				//Set the hash and send the email.
				User::update($user->id,array(
										'password_reset_hash'=> Str::random(32)  //Randon string
					));

				//let send the Email here..
				$user = User::where_email(Input::get('email'))->first(); //send the lates password reset code
				$message = Message::to(Input::get('email'))
	            ->from('kimfraser@gmail.com', 'kim fraser')
	            ->subject('MY APP | Password reset')
	            ->body('Hello here is go here to reset you password '.HTML::link_to_route('newpassword','Reset password Here',array($user->password_reset_hash)))
	            ->html (true)
	            ->send();
				//everything is good, redirect back
				return Redirect::to_route('getpassword')
							->with('message','An email has been sent to ' . Input::get('email') . ' with password reset instructions.');
		}

		public function get_resetpassword($password_reset_hash)
		{
		$user=$user = User::where_password_reset_hash($password_reset_hash)->first(); //let get the hash password
			if(!$password_reset_hash || !$user)				
				return View::make('user.requestpassword')->with('message', 'Reset code expire or something');
			
			return View::make('user.resetpassword')->with(array('user'=>$user));
		}


		public function post_savepassword()
		{
			$rules = array(
					'password'=>'confirmed|required|min:4'
				);
			$password_reset_hash = Input::get('password_reset_hash');
			$v = Validator::make(Input::all(),$rules );
			if($v->fails())
				return Redirect::to('user/'.$password_reset_hash .'/resetpassword')
											->with_errors($v);

			$user=$user = User::where_password_reset_hash($password_reset_hash)->first(); 						
			User::update($user->id,array(
										'password_reset_hash' => '',
										'password'=> Hash::make(Input::get('password'))
				));
			//return Redirect::to_route('login')->with('message','Password successfully reset.');

		}

				public function get_dashboard()
		{
			$id = Auth::user()->id;
			return View::make('user.dashboard')
			->with(array('data'=> User::find($id)->jobs));
		}

	}
