@layout('template.default')
	@section('content')
		<div class='six columns'>
			<h2>Create your ad</h2>
			{{Form::open('job/update', 'PUT')}}
				{{Form::label('company', 'Name of Company:')}}
				{{Form::text('company',$job->company)}}

				{{Form::label('title', 'Job Title:')}}
				{{Form::text('title',$job->title)}}


				{{Form::label('location', 'Job Location:')}}
				{{Form::text('location',$job->location)}}

				{{Form::label('detail', 'Job Description:')}}
				{{Form::textarea('detail',$job->detail)}}

				{{Form::label('howtoapply', 'How to Apply:')}}
				{{Form::textarea('apply',$job->apply)}}

				{{Form::hidden('id',$job->id)}}

				{{Form::submit('Edit Job')}}
			{{Form::close()}}

		</div>

	@endsection