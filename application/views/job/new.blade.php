@layout('template.default')
	@section('content')
	
		<div class="row content">
			<div class='six columns'>
			<h2>Create your ad</h2>
			<hr />
			{{Form::open('job/save', 'POST')}}
				{{Form::label('company', 'Name of Company:')}}
				{{Form::text('company',Input::old('company'))}}<small class=" {{$errors->has('company')? 'error' : ''}} ">{{$errors->first('company') }}</small>

				{{Form::label('title', 'Job Title:')}}
				{{Form::text('title',Input::old('title'))}}<small class=" {{$errors->has('title')? 'error' : ''}} ">{{$errors->first('title') }}</small>


				{{Form::label('location', 'Job Location:')}}
				{{Form::text('location',Input::old('location'))}}<small class=" {{$errors->has('location')? 'error' : ''}} ">{{$errors->first('location') }}</small>

				{{Form::label('detail', 'Job Description:')}}
				{{Form::textarea('detail',Input::old('detail'))}}<small class=" {{$errors->has('detail')? 'error' : ''}} ">{{$errors->first('detail') }}</small>

				{{Form::label('howtoapply', 'How to Apply:')}}
				{{Form::textarea('apply',Input::old('apply'),array('rows' => '5'))}}<small class=" {{$errors->has('apply')? 'error' : ''}} ">{{$errors->first('apply') }}</small>

				{{Form::submit('Post A Job',array('class'=>'large secondary button'))}} {{HTML::link_to_route('home','cancel')}}
			{{Form::close()}}

		</div>
	</div>


	@endsection