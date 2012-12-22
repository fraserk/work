@layout('template.default')

@section('content')
<div class="row content">
	<div class="eight columns">
			<h5>Recover Password</h5>

			{{Form::open('user/sendpassword','POST')}}
				{{Form::label('email','Email:')}}
				{{Form::text('email')}}

				
				{{Form::submit('Request Password',array('class'=>'large button secondary'))}}

				
			{{Form::close()}}
	</div>
</div>
@endsection