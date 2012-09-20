@layout('template.default')


@section('content')
	<div class="eight columns">
	<h3>Register</h3>

	{{Form::open('user/save','POST')}}

		{{Form::label('Email','Email Address')}}
		{{Form::text('email')}}

		{{Form::label('Username','Username:')}}
		{{Form::text('username')}}

		{{Form::label('Password','Password:')}}
		{{Form::password('password')}}
		{{Form::password('password2')}}

		{{Form::submit('Register')}}

	{{Form::close()}}

</div>
@endsection