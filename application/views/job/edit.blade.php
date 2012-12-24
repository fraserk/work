@layout('template.default')
	@section('content') 
	<div class="row content">
		<div class='six columns'>
			<h2>Edit Your Ad</h2>
			<hr />
			{{Form::open('job/update', 'PUT')}}
				{{Form::label('company', 'Name of Company:')}}
				{{Form::text('company',$job->company)}} <small class=" {{$errors->has('company')? 'error' : ''}} ">{{$errors->first('company') }}</small>

				{{Form::label('title', 'Job Title:')}}
				{{Form::text('title',$job->title)}}<small class=" {{$errors->has('title')? 'error' : ''}} ">{{$errors->first('title') }}</small>


				{{Form::label('location', 'Job Location:')}}
				{{Form::text('location',$job->location)}}<small class=" {{$errors->has('location')? 'error' : ''}} ">{{$errors->first('location') }}</small>

				{{Form::label('detail', 'Job Description:')}}
				{{Form::textarea('detail',$job->detail)}}<small class=" {{$errors->has('detail')? 'error' : ''}} ">{{$errors->first('detail') }}</small>

				{{Form::label('howtoapply', 'How to Apply:')}}
				{{Form::textarea('apply',$job->apply)}} <small class=" {{$errors->has('apply')? 'error' : ''}} ">{{$errors->first('apply') }}</small>


				{{Form::label('Status', 'Job Status')}}
				{{form::checkbox('status','1',$job->status)}}  @if ($job->status == true) <p>Active: un-check to de-activate job.</p> @else </p>Closed: Check to activate.</p> @endif
				{{Form::hidden('id',$job->id)}}

				<p>{{Form::submit('Edit Job',array('class'=>'large secondary button'))}}</p>
			{{Form::close()}}

		</div>
	</div>

	@endsection