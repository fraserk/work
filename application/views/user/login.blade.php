@layout('template.default')

@section('content')

<div class="row content">
	<div class="eight columns">
			<h5>Login</h5>
			<div class="row">
				<div class="five columns">
			{{Form::open('user/logincheck','POST')}}
				{{Form::label('email','Email:')}}
				{{Form::text('email')}}

				{{Form::label('password','Password:')}}
				{{Form::password('password')}}
				<p>{{Form::checkbox('remember','on')}} Remember Me</p>
				{{Form::submit('Login',array('class'=>'large button secondary'))}}

				<p>{{HTML::link_to_route('home','Register')}} : {{HTML::link_to_route('getpassword','Forgotten your password?')}}</p>
			{{Form::close()}}
		</div>
	</div>
	</div>
</div>

@endsection

@section('sidebar')

@endsection