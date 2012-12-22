@layout('template.default')


@section('content')
<div class="row">
	<div class="twelve columns content">
		<div class="row">
			<div class="six columns">
				<h3>Register</h3>
				<div class="row">
				<div class="five columns">
				{{Form::open('user/save','POST')}}

					{{Form::label('Email','Email Address:')}}
					{{Form::text('email',Input::old('email'))}}<small class=" {{$errors->has('email')? 'error' : ''}} ">{{$errors->first('email') }}</small>

					{{Form::label('Username','Username:')}}
					{{Form::text('username',Input::old('username'))}}<small class=" {{$errors->has('username')? 'error' : ''}} ">{{$errors->first('username') }}</small>

					{{Form::label('Password','Password:')}}
					{{Form::password('password')}}<small class=" {{$errors->has('password')? 'error' : ''}} ">{{$errors->first('password') }}</small>
					{{Form::label('Password','Comfirm Password:')}}
					{{Form::password('password_confirmation')}}

					{{Form::submit('Register',array('class'=>'large button secondary'))}}

				{{Form::close()}}
			</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection