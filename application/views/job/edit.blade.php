@layout('template.default')
	@section('content') 
	<div class="row content">
		<div class='six columns'>
			<h2>Edit Your Ad</h2>
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

				{{Form::label('Status', 'Job Status')}}
				{{form::checkbox('status','1',$job->status)}}
				{{Form::hidden('id',$job->id)}}

				<p>{{Form::submit('Edit Job',array('class'=>'large secondary button'))}}</p>
			{{Form::close()}}

		</div>
	</div>

	@endsection