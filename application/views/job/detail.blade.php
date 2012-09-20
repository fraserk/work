@layout('template.default')

@section('content')
	<div class="eight columns">
		<h3>{{$job->title}}</h3>

		<p>@{{$job->company}}</p>
		Posted {{$job->created_at = date("M d")}}
		<hr />
		<p >{{nl2br($job->detail)}}</p>
		<div class="panel"><h4 class="subheader">How to apply:</h4>{{nl2br($job->apply)}}</div>
		<p>{{HTML::link_to_route('edit','Edit',$job->id)}}</p>
	</div>
@endsection