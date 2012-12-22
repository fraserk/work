@layout('template.default')
@section('content')
<div class="row content">
	<div class="eight columns">
		<h3>Reset password</h3>

	{{Form::Open('user/savepassword','POST')}}
		{{Form::label('password','Type New password:')}}
		{{Form::password('password')}}<small class=" {{$errors->has('password')? 'error' : ''}} ">{{$errors->first('password') }}</small>
		{{Form::label('password_confirmation','Re-type password:')}}
		
		{{Form::password('password_confirmation')}}<small class=" {{$errors->has('password_confirmation')? 'error' : ''}} ">{{$errors->first('password_confirmation') }}</small>
		{{Form::submit('Reset Password',array('class'=>'large button secondary'))}}
		{{Form::hidden('password_reset_hash',$user->password_reset_hash)}}
	{{Form::Close()}}
	</div>
</div>

@endsection
