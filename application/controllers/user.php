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
			User::Create(array(
					'email' => Input::get('email'),
					'Username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'))
					));

			return Redirect::to_route('home');

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

				$user = User::where_email(Input::get('email'))->first(); //get the user emil
					if (!$user)
							return Redirect::to_route('getpassword')
													->with('message','Email could no be found')
													->with_input('only',array('email'));

				//Set the hash and send the email.
				User::update($user->id,array(
										'password_reset_hash'=> Hash::make('dqYZfTvJ65jpZ4OmgHYiVKILYIu78Yzo')  //Randon string
					));


				//let send the Email here..

				SBundle::start('swiftmailer');
				$mailer = IoC::resolve('mailer');
				$message = Swift_message::newInstance('Password Reset')
							->setFrom(array('kimfraser@gmail.com'=>'Kim Fraser'))
							->setTo(array('kimfraser@gmail.com'=>'Kimfraser'))
							->addPart('My Plain Text Message','text/plain')
    						->setBody('My HTML Message','text/html');
			    $mailer->send($message);


				//everything is good, redirect back
				return Redirect::to_route('getpassword')
							->with('message','An email has been sent to ' . Input::get('email') . ' with password reset instructions.');
													

		}

		public function get_dashboard()
		{
			$id = Auth::user()->id;
			return View::make('user.dashboard')
			->with(array('data'=> User::find($id)->jobs));
		}

	}
