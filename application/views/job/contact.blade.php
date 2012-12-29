@layout('template.default')
	@section('content')
	<div class="row content">
		<div class="eight columns">
			<h2>Contact us</h2>
			<hr />
			{{Form::open('contact','POST')}}
				{{Form::label('Name','Your Name*')}}
				{{Form::text('name',Input::old('name'))}}<small class=" {{$errors->has('name')? 'error' : ''}} ">{{$errors->first('name') }}</small>

				{{Form::label('email','Your Email*')}}
				{{Form::text('email',Input::old('email'))}}<small class=" {{$errors->has('email')? 'error' : ''}} ">{{$errors->first('email') }}</small>

				{{Form::label('Message','Message*')}}
				{{Form::textarea('message',Input::old('message'))}}<small class=" {{$errors->has('message')? 'error' : ''}} ">{{$errors->first('message') }}</small>

				{{form::submit('submit',array('class'=>'button normal large'))}}

			{{Form::close()}}
		</div>
	</div>

	@endsection